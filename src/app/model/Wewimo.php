<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kriz
 * Date: 26. 1. 2016
 * Time: 14:09
 */

namespace App\Model;

use App\Services\CryptoSluzba;
use PEAR2\Net\RouterOS;
use PEAR2\Net\RouterOS\Response;
use Tracy\Debugger;
use Nette;


class Wewimo
{
    private $ipadresa;
    private $ap;
    private $cryptoService;

    public function __construct(CryptoSluzba $cryptoService, IPAdresa $ipadresa, AP $ap) {
        $this->ipadresa = $ipadresa;
        $this->ap = $ap;
        $this->cryptoService = $cryptoService;
    }

    public function getWewimoData($ip, $username, $password, $invoker)
    {
        // default values (when not present in $responses) of optional attributes
        $defaultRegistrationRow = array(
            'radio-name' => '',
            'routeros-version' => '',
            'tx-signal-strength' => '',
            'tx-ccq' => '',
            'rx-ccq' => '',
            'x-tx-signal-strength' => '',
            'x-tx-signal-strength-pct' => '',
            'last-ip' => ''
        );
        $defaultInterfaceRow = array(
            'frequency' => '',
            'wireless-protocol' => ''
        );
        $defaultNeighborRow = array(
            'platform' => '',
            'board' => '',
            'identity' => ''
        );
        $client = new RouterOS\Client($ip, $username, $password);
        // write a nice message into RB's log
        $logRequest = new RouterOS\Request('/log/info');
        $logRequest->setArgument('message', "Hi! It's Wewimo at userdb.hkfree.org invoked by ".$invoker);
        $client->sendSync($logRequest);

        $data = array(
            'interfaces' => array(),
            'resources' => array()
        );

        // get system resources (uptime, HW/SW versions, CPU utilisation,...)
        $systemResourcesResponses = $client->sendSync(new RouterOS\Request('/system/resource/print'));
        // actually, there is only one row in the response, but we have to iterate
        foreach ($systemResourcesResponses as $response) {
            if ($response->getType() === Response::TYPE_DATA) {
                $row = $response->getIterator()->getArrayCopy(); // ArrayObject => array
                $data['resources'] = $row;
            }
        }

        // get wireless table
        $wirelessTableResponses = $client->sendSync(new RouterOS\Request('/interface/wireless/print'));
        foreach ($wirelessTableResponses as $response) {
            if ($response->getType() === Response::TYPE_DATA) {
                $row = $response->getIterator()->getArrayCopy(); // ArrayObject => array
                // merge default values and real values (override defaults with real, leave default when real value missing)
                $row = array_merge($defaultInterfaceRow, $row);
                //Debugger::dump($row);
                $data['interfaces'][$row['name']] = $row;
                $data['interfaces'][$row['name']]['stations'] = array();

                // get monitored values (e.g. current tx power)
                $wirelessInterfaceMonitorResponses = $client->sendSync(new RouterOS\Request('/interface wireless monitor numbers='.$row['.id'].' once'));
                foreach ($wirelessInterfaceMonitorResponses as $response2) {
                    if ($response2->getType() === Response::TYPE_DATA) {
                        $row2 = $response2->getIterator()->getArrayCopy();
                        $this->parseAddCurrentTxPower($row2);
                        $data['interfaces'][$row['name']]['monitor'] = $row2;
                    }
                }
            }
        }

        // get neighbors table
        $neighborsTableResponses = $client->sendSync(new RouterOS\Request('/ip/neighbor/print'));
        $neighborsByMac = array();
        $neighborsByIp = array();
        foreach ($neighborsTableResponses as $neighResponse) {
            if ($neighResponse->getType() === Response::TYPE_DATA) {
                $row = $neighResponse->getIterator()->getArrayCopy(); // ArrayObject => array
                // merge default values and real values (override defaults with real, leave default when real value missing)
                $row = array_merge($defaultNeighborRow, $row);
                // derive additional attributes (marked with x- prefix)
                $row['x-device-type'] = str_replace('MikroTik','MT',$row['platform'].' '.$row['board']);
                if ($row['platform'] != 'MikroTik') $row['x-device-type'] .= ' '.$row['version'];
                //Debugger::dump($row);
                $neighborsByMac[$row['mac-address']] = $row;

                if(in_array('address', $row))
                {
                    $neighborsByIp[$row['address']] = $row;
                }
            }
        }

        // get registration table
        $regTableResponses = $client->sendSync(new RouterOS\Request('/interface/wireless/registration-table/print'));
        // see  /interface wireless registration-table print stats
        // command in terminal for available attributes
        foreach ($regTableResponses as $response) {
            if ($response->getType() === Response::TYPE_DATA) {
                $row = $response->getIterator()->getArrayCopy(); // ArrayObject => array
                // merge default values and real values (override defaults with real, leave default when real value missing)
                $row = array_merge($defaultRegistrationRow, $row);
                // derive additional attributes (marked with x- prefix)
                $row['x-signal-to-noise'] = preg_replace('/^(\\-[0-9]+).*$/', '$1', $row['signal-to-noise']); // signal strength as a plain number -54 instead of -54dBm@HT20-6
                $row['x-signal-to-noise-pct'] = $this->dbm2pct($row['x-signal-to-noise'], 0, 90);
                $row['x-signal-strength'] = preg_replace('/^(\\-[0-9]+).*$/', '$1', $row['signal-strength']); // signal strength as a plain number -54 instead of -54dBm@HT20-6
                $row['x-signal-strength-pct'] = $this->dbm2pct($row['x-signal-strength']);
                if ($row['tx-signal-strength']) {
                    $row['x-tx-signal-strength'] = preg_replace('/^(\\-[0-9]+).*$/', '$1', $row['tx-signal-strength']); // signal strength as a plain number -54 instead of -54dBm@HT20-6
                    $row['x-tx-signal-strength-pct'] = $this->dbm2pct($row['x-tx-signal-strength']);
                }
                $row['x-rx-rate'] = 1*preg_replace('/Mbps.*$/', '', $row['rx-rate']); // rate as a plain number 48 instead of 48.0Mbps
                $row['x-tx-rate'] = 1*preg_replace('/Mbps.*$/', '', $row['tx-rate']); // rate as a plain number 48 instead of 48.0Mbps
                $bytes = explode(',', $row['bytes']);
                $row['x-tx-bytes'] = $bytes[0];
                $row['x-rx-bytes'] = $bytes[1];
                $row['x-anonymous-mac-address'] = preg_replace('/^([A-Fa-f0-9]{2}):([A-Fa-f0-9]{2}):([A-Fa-f0-9]{2}):([A-Fa-f0-9]{2}):([A-Fa-f0-9]{2}):([A-Fa-f0-9]{2})$/',
                                                        '$1:$2:$3:XX:XX:$6', $row['mac-address']);
                // match additional info from neighbors by MAC address
                if (array_key_exists($row['mac-address'], $neighborsByMac)) {
                    // found by MAC in neighbors
                    $neigh = $neighborsByMac[$row['mac-address']];
                    $row['x-device-type'] = $neigh['x-device-type'];
                    $row['x-identity'] = $neigh['identity'];
                    $this->sanitizeAttribute($row, 'x-identity');
                    $row['x-in-neighbors'] = 1;
                } else {
                    $row['x-device-type'] = '';
                    $row['x-identity'] = '';
                    $row['x-in-neighbors'] = 0;
                }
                $data['interfaces'][$row['interface']]['stations'][] = $row;
            }
        }

        $data['neighborsByIp'] = $neighborsByIp;

        return $data;
    }

    private function parseAddCurrentTxPower(&$monitorRow) {
        $monitorRow['x-current-tx-powers'] = [];
        if (array_key_exists('current-tx-powers', $monitorRow)) {
            // comma is usually used as a separator of different modulation rates but in some versions semicolon is used instead
            foreach (preg_split ('/[;,]/',$monitorRow['current-tx-powers']) as $modulationRec) {
                if (preg_match('/^(.+?):(\d+)/', $modulationRec, $match)) {
                    $monitorRow['x-current-tx-powers'][$match[1]] = $match[2];
                }
            }
        }
    }

    private function dbm2pct($dBm, $min=-100, $max=-20) {
        // linear approx.
        $a = 100/($max - $min);
        $b = -$a*$min;
        $val = $a*$dBm + $b;
        // crop to 0..100
        if ($val > 100) $val = 100;
        if ($val < 0) $val = 0;
        return round($val);
    }

    public function sanitizeAttribute(&$assocArray, $attributeName) {
        if (array_key_exists($attributeName, $assocArray)) {
            if (!mb_detect_encoding($assocArray[$attributeName],'UTF-8', true)) {
                // if not valid UTF-8 string, convert from latin-1 to UTF-8
                $assocArray[$attributeName] = utf8_encode($assocArray[$attributeName]); // TODO maybe detect which encoding is used in source string
                //$assocArray[$attributeName] = urlencode($assocArray[$attributeName]); // for debugging purpose
            }
        }
    }

    public function getWewimoFullData($apId, $invokerStr, $ip=null) {
        // AP podle ID
        $apt = $this->ap->getAP($apId*1);
        $wewimoMultiData = [];
        $wewimoMultiData['devices'] = [];
        if (!$apt) {
            $wewimoMultiData['error'] = 'Uknown AP ' . $apId;
            return $wewimoMultiData;
        }
        // k AP dohledat IP adresy, ktere maji nastaven priznak Wewimo
        $apIps = $apt->related('IPAdresa.Ap_id')->where('wewimo', 1);
        if ($ip) {
            // omezit jen na jednu IP - vyuziva se v AJAXovem prekreslovani zmen,
            // misto jednoho pozadavku-odpovedi na vsechny IP (RB) se AJAXem posila
            // nekolik pozadavku (jeden na jednu IP) cimz je aktualizace rychlejsi (paralelizace)
            $apIps = $apIps->where('ip_adresa', $ip);
        }
        $apIps = $apIps->order('INET_ATON(ip_adresa)');
        foreach ($apIps as $ip) {
            try {
                $ip_password = $ip['heslo'];
                if($ip['heslo_sifrovane'] == 1)
                {
                    $ip_password = $this->cryptoService->decrypt($ip['heslo']);
                }
                $wewimoData = $this->getWewimoData($ip['ip_adresa'], $ip['login'], $ip_password, $invokerStr);
                $searchMacs = array();
                $searchIps = array();
                // doplnit nazvy (IP) k MAC adresam a k last-ip, sanovat nektere problematicke stringove atributy
                foreach ($wewimoData['interfaces'] as $interfaceName => &$xinterface) {
                    $this->sanitizeAttribute($xinterface, 'comment');
                    foreach ($xinterface['stations'] as &$xstation) {
                        if ($xstation['mac-address']) $searchMacs[] = $xstation['mac-address'];
                        if ($xstation['last-ip']) $searchIps[] = $xstation['last-ip'];
                        $this->sanitizeAttribute($xstation, 'comment');
                        $this->sanitizeAttribute($xstation, 'radio-name');
                    }
                }
                $ips = $this->ipadresa->getIpsByMacsMap($searchMacs);
                $ips2 = $this->ipadresa->getIpsMap($searchIps);
                $lastIpsByMac = $this->ipadresa->getLastIpsForMacs($searchMacs);
                foreach ($wewimoData['interfaces'] as &$interface) {
                    foreach ($interface['stations'] as &$station) {
                        $station['xx-grafana-link'] = 'http://sojka.hkfree.org/grafana/d/dKlgTs6mk/wewimo?orgId=1&from=now-20d&to=now&refresh=1h&var-Station_MAC=' . $station['mac-address'];
                        if (array_key_exists($station['mac-address'], $ips)) {
                            $ipRec = $ips[$station['mac-address']];
                            if ($ipRec->hostname || !($ipRec->Uzivatel_id)) {
                                $station['xx-mac-host'] = $ipRec->hostname;
                            } else {
                                $station['xx-mac-host'] = '('.$ipRec->ref('Uzivatel')->nick.')';
                            }
                            $station['xx-mac-ip-id'] = $ipRec->id;
                            if ($ipRec->Uzivatel_id) {
                                $station['xx-mac-link'] = [
                                    'presenter' => 'Uzivatel:show',
                                    'id' => $ipRec->Uzivatel_id,
                                    'anchor' => "#ip" . $ipRec->ip_adresa,
                                ];
                                //$this->link('Uzivatel:show', array('id' => $ipRec->Uzivatel_id)) . "#ip" . $ipRec->ip_adresa;
                                $station['xx-user-nick'] = $ipRec->ref('Uzivatel')->nick;
                            } else {
                                $station['xx-mac-link'] = [
                                    'presenter' => 'Ap:show',
                                    'id' => $ipRec->Ap_id,
                                    'anchor' => "#ip" . $ipRec->ip_adresa,
                                ];
                                //$this->link('Ap:show', array('id' => $ipRec->Ap_id)) . "#ip" . $ipRec->ip_adresa;
                                $station['xx-user-nick'] = 'AP';
                            }
                            if (!$station['x-in-neighbors']) {
                                // pokud uz zarizeni nebylo nalezeno v neighbors podle MAC (v ramci metody getWewimoData)
                                // tak zkusit doparovat podle IP: MAC -> IP (z databaze) -> info o zarizeni (z neighbors podle IP)
                                $stationIp = $ipRec->ip_adresa; // IP adresa z databaze dohledana podle MAC
                                if (array_key_exists($stationIp, $wewimoData['neighborsByIp'])) {
                                    $neighFound = $wewimoData['neighborsByIp'][$stationIp];
                                    $station['x-in-neighbors'] = 2;
                                    $station['x-device-type'] = $neighFound['x-device-type'];
                                    $station['x-identity'] = $neighFound['identity'];
                                    $this->sanitizeAttribute($station, 'x-identity');
                                }
                            }
                        } else {
                            $station['xx-mac-ip-id'] = NULL;
                            $station['xx-mac-host'] = '';
                            $station['xx-mac-link'] = NULL;
                        }
                        // dohledani hostname a linku na uzivatele pro Last-IP
                        if (array_key_exists($station['last-ip'], $ips2)) {
                            $ipRec = $ips2[$station['last-ip']];
                            $this->prepareIpInfoAndLink($ipRec, $station);
                        } else {
                            $station['xx-last-ip-id'] = NULL;
                            $station['xx-last-ip-host'] = '';
                            $station['xx-last-ip-link'] = NULL;
                        }
                        // pripojeni vsech dosud videnych Last-IP k dane MAC
                        if (array_key_exists($station['mac-address'], $lastIpsByMac)) {
                            // vybrat vsechny Last-IP krome te, ktera je zaroven zobrazena jako aktualne ziskana z RB,
                            // pozor! array_filter zachovava indexy pole, takze muzeme dostat pole s indexy 0,1,3
                             $relevantIpRecords = array_filter(
                                $lastIpsByMac[$station['mac-address']],
                                function ($row) use($station) {
                                    return ($row['ip_adresa'] != $station['last-ip']);
                                }
                            );
                            // k last-ips vygenerovat linky a nazvy (host/nick)
                            $station['xx-last-ips'] = array_map(
                                function($row) {
                                    $stationInfo = [
                                        'last-ip' => $row['ip_adresa'],
                                        'w_timestamp' => $row['w_timestamp']
                                    ];
                                    $this->prepareIpInfoAndLink($row, $stationInfo);
                                    return $stationInfo;
                                },
                                $relevantIpRecords);
                        } else {
                            $station['xx-last-ips'] = [];
                        }

                    }
                }
                $wewimoData['error'] = '';
            } catch (\Exception $ex) {
                $wewimoData = array();
                $wewimoData['interfaces'] = array();
                $wewimoData['error'] = $ex->getMessage();
            }
            $wewimoData['ip'] = $ip['ip_adresa'];
            $wewimoData['ip_id'] = $ip['id'];
            $wewimoData['hostname'] = $ip['hostname'];
            $wewimoMultiData['devices'][] = $wewimoData;
        }
        $this->ipadresa->updateWewimoStatsHook($wewimoMultiData['devices']);
        return $wewimoMultiData;
    }

    /**
     * @param $ipRec
     * @param $station
     */
    public function prepareIpInfoAndLink($ipRec, &$station)
    {
        if ($ipRec->hostname || !($ipRec->Uzivatel_id)) {
            $station['xx-last-ip-host'] = $ipRec->hostname;
        } else {
            $station['xx-last-ip-host'] = '('.$ipRec->ref('Uzivatel')->nick.')';
        }
        $station['xx-last-ip-id'] = $ipRec->id;
        if ($ipRec->Uzivatel_id) {
            $station['xx-last-ip-link'] = [
                'presenter' => 'Uzivatel:show',
                'id' => $ipRec->Uzivatel_id,
                'anchor' => "#ip" . $ipRec->ip_adresa,
            ];
            //$this->link('Uzivatel:show', array('id' => $ipRec->Uzivatel_id)) . "#ip" . $ipRec->ip_adresa;
            $station['xx-last-ip-user-nick'] = $ipRec->ref('Uzivatel')->nick;
        } else {
            $station['xx-last-ip-link'] = [
                'presenter' => 'Ap:show',
                'id' => $ipRec->Ap_id,
                'anchor' => "#ip" . $ipRec->ip_adresa,
            ];
            //$this->link('Ap:show', array('id' => $ipRec->Ap_id)) . "#ip" . $ipRec->ip_adresa;
            $station['xx-last-ip-user-nick'] = 'AP';
        }

    }


}
