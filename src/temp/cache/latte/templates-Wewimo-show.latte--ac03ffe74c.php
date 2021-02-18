<?php
// source: /opt/userdb/app/templates/Wewimo/show.latte

use Latte\Runtime as LR;

class Templateac03ffe74c extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_wewimoContainer' => 'blockWewimoContainer',
	];

	public $blockTypes = [
		'content' => 'html',
		'_wewimoContainer' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['lastIp'])) trigger_error('Variable $lastIp overwritten in foreach on line 165');
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 79');
		if (isset($this->params['interfaceName'])) trigger_error('Variable $interfaceName overwritten in foreach on line 33');
		if (isset($this->params['interface'])) trigger_error('Variable $interface overwritten in foreach on line 33');
		if (isset($this->params['wewimoOneDevice'])) trigger_error('Variable $wewimoOneDevice overwritten in foreach on line 6');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		?><h3>Wewimo <?php echo LR\Filters::escapeHtmlText($ap->jmeno) /* line 2 */ ?></h3>
<label for="refresh"><input type="checkbox" name="refresh" id="refresh"> Aktualizovat</label>
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('wewimoContainer')) ?>"><?php
		$this->renderBlock('_wewimoContainer', $this->params) ?></div>
<?php
		if (!$wewimo) {
?>
    <div class="well">
        U žádné IP na AP není nastaven příznak Wewimo.
        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:edit", ['id' => $ap->id])) ?>">Nastavte si u AP</a> (zatržítko Wewimo u IP), ze kterých Routerboardů má Wewimo zobrazovat připojené klienty.
        Routerboardy musí mít zapnuto API (viz Winbox: IP - Services) a zadáno uživatelské jméno a heslo v userdb.
    </div>
<?php
		}
?>

<p>
    <small>
        MAC je klikací a pojmenovaná (host), pokud je zadána u nějakého zařízení v databázi; dodržte tvar 01:02:AA:BB:CC.
        Last IP je klikací a pojmenovaná (host), pokud je zadána u nějakého zařízení v databázi.
        Údaje Identity a Device se čtou z Neighbours - pokud je chcete vidět, ujistěte se, že klientské zařízení posílá MikroTik Neighbor Discovery (MNDP/CDP) packety na rozhraní směrem k AP; viz nastavení IP - Neighbors - Discovery Interfaces.
        Některé citlivé údaje vidíte pouze ve vaší oblasti, v cizí oblasti se zobrazují nickname uživatelů místo konkrétních hostname a MAC adresy jsou anonymizované.
    </small>
</p>

<script>

function hideUselessToggleLastIps() {
    $('[data-last-ips-toggle]').each(function() {
        var rbIpIfacePair = $(this).data('last-ips-toggle');
        console.log('hideUselessToggleLastIps testing', rbIpIfacePair, $('[data-last-ips-id="'+rbIpIfacePair+'"]').length);
        if ($('[data-last-ips-id="'+rbIpIfacePair+'"]').length == 0) {
            // no hidden rows with more last-ips exists, hide [+] toggle
            $(this).hide();
        }
    });
}

function setToggle(toggleLink, plus) {
    if (plus) {
        $(toggleLink).find('i').attr('class', 'fa fa-plus-square');
    } else {
        $(toggleLink).find('i').attr('class', 'fa fa-minus-square');
    }
}

function toggleLastIps(rbIp, rbInterface, stationMac) {
    console.log("toggleLastIps", rbIp, rbInterface, stationMac);
    var ifaceSelector = '[data-last-ips-id="'+rbIp+','+rbInterface+'"]';
    var ifaceToggleSelector = '[data-last-ips-toggle="'+rbIp+','+rbInterface+'"]';
    var ipsSelector = stationMac ? '[data-last-ips-mac="'+rbIp+','+rbInterface+','+stationMac+'"]' : ifaceSelector;
    console.log("ipsSelector", ipsSelector);
    // test if all (iface-related or station-related) IPs are visible
    var allVisible = true;
    $(ipsSelector).each(function() {
        if ($(this).is(':hidden')) allVisible = false;
    });
    if (allVisible) {
        // hide all
        $(ipsSelector).hide();
        if (stationMac) {
            // particular station's IPs hidden
            // switch station toggle to [+]
            var stationToggleSelector = '[data-last-ips-mac-toggle="'+rbIp+','+rbInterface+','+stationMac+'"]';
            setToggle(stationToggleSelector, true);
            // we are sure that some (this) station-related IPs are hidden,
            // switch iface toggle to [+]
            setToggle(ifaceToggleSelector, true);
        } else {
            // all stations' IPs hidden
            // switch all iface-related toggles to [+]
            setToggle(ifaceToggleSelector, true);
            setToggle('[data-last-ips-permac-toggle="'+rbIp+','+rbInterface+'"]', true);
        }
    } else {
        // show all
        $(ipsSelector).show();
        if (stationMac) {
            // particular station's IPs shown
            // switch station toggle to [-]
            var stationToggleSelector = '[data-last-ips-mac-toggle="'+rbIp+','+rbInterface+','+stationMac+'"]';
            setToggle(stationToggleSelector, false);
            // test if all iface-related IPs are visible
            var ifaceAllVisible = true;
            $(ifaceSelector).each(function() {
                if ($(this).is(':hidden')) ifaceAllVisible = false;
            });
            // if all visible, switch iface toggle to [-], else [+]
            setToggle(ifaceToggleSelector, !ifaceAllVisible);
        } else {
            // all stations' IPs shown
            // switch all iface-related toggles to [-]
            setToggle(ifaceToggleSelector, false);
            setToggle('[data-last-ips-permac-toggle="'+rbIp+','+rbInterface+'"]', false);
        }
    }
    return false; // do not follow the dummy link
}

$(function(){
    $.nette.init();

    hideUselessToggleLastIps();

    var refreshDelay = 1000;

    var timerByIp = {};
    var requestByIp = {};

    $("#refresh").change(function() {
        if(this.checked) {
            // prave zaskrtnut checkbox, nastartovat automaticke aktualizovani pres AJAX
            $(".oneDevice").each(function() {
                var ip = $(this).data('ip');
                refreshIp(ip);
            });
        } else {
            // prave odskrtnut checkbox, zrusit vsechny bezici casovace a rozjete AJAXy
            $.each(timerByIp, function( ip, timer ) {
                clearTimeout(timer);
                console.log('clearing timer', ip, timer);
            });
            $.each(requestByIp, function( ip, xhr ) {
                console.log('aborting xhr', ip, xhr);
                xhr.abort();
            });
        }
    });


    function refreshIp(ip) {
        console.log('xhr starting', ip);
        requestByIp[ip] = $.nette.ajax({
            url: "?do=update&ip="+ip,
            complete: function (jqXHR, textStatus) {
                hideUselessToggleLastIps();
                console.log('xhr completed', ip, textStatus);
                if (textStatus !== 'abort') {
                    // pokud je jeste zaskrtnut checkbox, (s odkladem) zahajit dalsi aktualizaci
                    if ($("#refresh").prop('checked')) {
                        timerByIp[ip] = setTimeout(function() {
                            refreshIp(ip);
                        }, refreshDelay);
                        console.log('timer scheduled', ip, timerByIp[ip]);
                    }
                }
            },
            // zakazat cancel predchoziho pozadavku (chceme posilat paralelne pozadavky na ruzne IP),
            // aby nesly dva pozadavky na jednu IP zaroven je zajisteno tim, ze novy pozadavek na tutez IP
            // se posila az po complete predchoziho pozadavku na danou IP
            off: ['unique']
        });
    }
});

</script>


<?php
	}


	function blockWewimoContainer($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("wewimoContainer", "static");
?>
    <table class="table ">
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($wewimo) as $wewimoOneDevice) {
			?>            <tbody class="oneDevice" data-ip="<?php echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 7 */ ?>"<?php
			echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('wewimoDevice-'.$wewimoOneDevice['ip'])) . '"' ?>>
<?php
			$this->global->snippetDriver->enter('wewimoDevice-'.$wewimoOneDevice['ip'], "dynamic");
?>                        <tr>
                            <td colspan="20">
                                <div class="wewimo-device-header">
<?php
			if ($wewimoOneDevice['error']) {
?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['error']) /* line 13 */ ?> <?php
				echo LR\Filters::escapeHtmlText($wewimoOneDevice['ip']) /* line 13 */ ?> (ujistěte se, že máte v RB povoleno API v IP - Services)
                                            </div>
<?php
			}
			else {
?>
                                            <i class="fa fa-microchip" aria-hidden="true"></i>
                                            &nbsp;
                                            <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['ip']) /* line 18 */ ?>

                                            |
                                            <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['hostname']) /* line 20 */ ?>

                                            |
                                            <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['resources']['board-name']) /* line 22 */ ?>

                                            |
                                            <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['resources']['version']) /* line 24 */ ?>

                                            |
                                            Uptime <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['resources']['uptime']) /* line 26 */ ?>

                                            |
                                            CPU load <?php echo LR\Filters::escapeHtmlText($wewimoOneDevice['resources']['cpu-load']) /* line 28 */ ?>%
<?php
			}
?>
                                </div>
                            </td>
                        </tr>
<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($wewimoOneDevice['interfaces']) as $interfaceName => $interface) {
				if (count($interface['stations']) > 0) {
?>
                        <tr>
                            <td colspan="20">
                                <div class="wewimo-iface-header">
                                        <?php echo LR\Filters::escapeHtmlText($interfaceName) /* line 38 */ ?> |
                                        SSID: <?php echo LR\Filters::escapeHtmlText($interface['ssid']) /* line 39 */ ?> |
                                        <?php echo LR\Filters::escapeHtmlText($interface['frequency']) /* line 40 */ ?> MHz |
                                        <?php echo LR\Filters::escapeHtmlText($interface['wireless-protocol']) /* line 41 */ ?>

<?php
					if (isset($interface['monitor']['wireless-protocol']) && $interface['monitor']['wireless-protocol']!=$interface['wireless-protocol'] && $interface['interface-type']!='virtual-AP' && $interface['interface-type']!='virtual') {
						?>                                            / <?php echo LR\Filters::escapeHtmlText($interface['monitor']['wireless-protocol']) /* line 43 */ ?>

<?php
					}
					if ($interface['interface-type'] == 'virtual-AP' || $interface['interface-type'] == 'virtual') {
?>
                                            |
                                            Virtual AP @ <?php echo LR\Filters::escapeHtmlText($interface['master-interface']) /* line 47 */ ?>

<?php
					}
					elseif (isset($interface['monitor']['x-current-tx-powers']['12Mbps'])) {
?>
                                            |
                                            TX <?php echo LR\Filters::escapeHtmlText($interface['monitor']['x-current-tx-powers']['12Mbps']) /* line 50 */ ?> dBm
<?php
					}
					elseif (isset($interface['monitor']['x-current-tx-powers']['11Mbps'])) {
?>
                                            |
                                            TX <?php echo LR\Filters::escapeHtmlText($interface['monitor']['x-current-tx-powers']['11Mbps']) /* line 53 */ ?> dBm
<?php
					}
?>

                                </div>
                            </td>
                        </tr>
                        <tr class="wewimo-table-header">
                            <th>MAC</th>
                            <th>MAC host</th>
                            <th>Radio name</th>
                            <th>Identity</th>
                            <th>RX signal</th>
                            <th>TX signal</th>
                            <th>SNR</th>
                            <th>RX CCQ</th>
                            <th>TX CCQ</th>
                            <th>RX rt.</th>
                            <th>TX rt.</th>
                            <th>RX bytes</th>
                            <th>TX bytes</th>
                            <th>Device</th>
                            <th>OS</th>
                            <th>Last IP</th>
                            <th>Last IP host</th>
                            <th><a href="#" title="Zobrazit všude další IP (podle Last-IP)" style="color: #C2E7FF" data-last-ips-toggle="<?php
					echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 77 */ ?>,<?php echo LR\Filters::escapeHtmlAttr($interfaceName) /* line 77 */ ?>" onClick="return toggleLastIps(<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($wewimoOneDevice['ip'])) /* line 77 */ ?>,<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($interfaceName)) /* line 77 */ ?>)"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                        </tr>
<?php
					$iterations = 0;
					foreach ($iterator = $this->global->its[] = new LR\CachingIterator($interface['stations']) as $row) {
						$stationsIterator = $iterator;
						?>                            <tr id="highlightable-mac:<?php echo LR\Filters::escapeHtmlAttr($row['mac-address']) /* line 81 */ ?>"<?php
						if ($_tmp = array_filter([$stationsIterator->odd ? 'manual-stripes-odd' : NULL])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>>
                                <td>
<?php
						if ($row['xx-mac-link']) {
							?>                                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($row['xx-mac-link'])) /* line 84 */ ?>"><?php
							echo LR\Filters::escapeHtmlText($row['mac-address']) /* line 84 */ ?></a>
<?php
						}
						else {
							?>                                        <?php echo LR\Filters::escapeHtmlText($row['mac-address']) /* line 86 */ ?>

<?php
						}
?>
                                    <a
                                        href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($row['xx-grafana-link'])) /* line 89 */ ?>"
                                        target="_blank"
                                        class="btn btn-default btn-xs btn-in-table"
                                        title=""
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        data-original-title="Otevřít graf signálu"><span class="glyphicon glyphicon-signal"></span></a>
                                </td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['xx-mac-host']) /* line 97 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['radio-name']) /* line 98 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-identity']) /* line 99 */ ?></td>
                                <td class="wewimo-sig">
<?php
						if ($row['x-signal-strength']) {
?>
                                        <div class="progress progress-inline progress-wewimo">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php
							echo LR\Filters::escapeHtmlAttr($row['x-signal-strength']) /* line 103 */ ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($row['x-signal-strength-pct'])) /* line 103 */ ?>%;">
                                            <?php echo LR\Filters::escapeHtmlText($row['x-signal-strength']) /* line 104 */ ?>

                                          </div>
                                        </div>
<?php
						}
?>
                                </td>
                                <td class="wewimo-sig">
<?php
						if ($row['x-tx-signal-strength']) {
?>
                                        <div class="progress progress-inline progress-wewimo">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php
							echo LR\Filters::escapeHtmlAttr($row['x-tx-signal-strength']) /* line 112 */ ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($row['x-tx-signal-strength-pct'])) /* line 112 */ ?>%;">
                                            <?php echo LR\Filters::escapeHtmlText($row['x-tx-signal-strength']) /* line 113 */ ?>

                                          </div>
                                        </div>
<?php
						}
?>
                                </td>
                                <td class="wewimo-sig">
<?php
						if ($row['x-signal-to-noise']) {
?>
                                        <div class="progress progress-inline progress-wewimo">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php
							echo LR\Filters::escapeHtmlAttr($row['x-signal-to-noise']) /* line 121 */ ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($row['x-signal-to-noise-pct'])) /* line 121 */ ?>%;">
                                            <?php echo LR\Filters::escapeHtmlText($row['x-signal-to-noise']) /* line 122 */ ?>

                                          </div>
                                        </div>
<?php
						}
?>
                                </td>
                                <td class="wewimo-ccq">
<?php
						if ($row['rx-ccq']) {
?>
                                        <div class="progress progress-inline progress-wewimo">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php
							echo LR\Filters::escapeHtmlAttr($row['rx-ccq']) /* line 130 */ ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($row['rx-ccq'])) /* line 130 */ ?>%;">
                                            <?php echo LR\Filters::escapeHtmlText($row['rx-ccq']) /* line 131 */ ?>%
                                          </div>
                                        </div>
<?php
						}
?>
                                </td>
                                <td class="wewimo-ccq">
<?php
						if ($row['tx-ccq']) {
?>
                                        <div class="progress progress-inline progress-wewimo">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php
							echo LR\Filters::escapeHtmlAttr($row['tx-ccq']) /* line 139 */ ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeCss($row['tx-ccq'])) /* line 139 */ ?>%;">
                                            <?php echo LR\Filters::escapeHtmlText($row['tx-ccq']) /* line 140 */ ?>%
                                          </div>
                                        </div>
<?php
						}
?>
                                </td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-rx-rate']) /* line 145 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-tx-rate']) /* line 146 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-rx-bytes']) /* line 147 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-tx-bytes']) /* line 148 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['x-device-type']) /* line 149 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['routeros-version']) /* line 150 */ ?></td>
                                <td>
<?php
						if ($row['xx-last-ip-link']) {
							?>                                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($row['xx-last-ip-link'])) /* line 153 */ ?>"><?php
							echo LR\Filters::escapeHtmlText($row['last-ip']) /* line 153 */ ?></a>
<?php
						}
						else {
							?>                                        <?php echo LR\Filters::escapeHtmlText($row['last-ip']) /* line 155 */ ?>

<?php
						}
?>
                                </td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['xx-last-ip-host']) /* line 158 */ ?></td>
                                <td>
<?php
						if (count($row['xx-last-ips']) > 0) {
							?>                                        <a href="#" title="Zobrazit další IP (podle Last-IP)" data-last-ips-permac-toggle="<?php
							echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 161 */ ?>,<?php echo LR\Filters::escapeHtmlAttr($interfaceName) /* line 161 */ ?>" data-last-ips-mac-toggle="<?php
							echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 161 */ ?>,<?php echo LR\Filters::escapeHtmlAttr($interfaceName) /* line 161 */ ?>,<?php
							echo LR\Filters::escapeHtmlAttr($row['mac-address']) /* line 161 */ ?>" onClick="return toggleLastIps(<?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($wewimoOneDevice['ip'])) /* line 161 */ ?>,<?php
							echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($interfaceName)) /* line 161 */ ?>,<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($row['mac-address'])) /* line 161 */ ?>)"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
<?php
						}
?>
                                </td>
                            </tr>
<?php
						$iterations = 0;
						foreach ($row['xx-last-ips'] as $lastIp) {
							?>                                <tr style="display:none" data-last-ips-id="<?php echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 166 */ ?>,<?php
							echo LR\Filters::escapeHtmlAttr($interfaceName) /* line 166 */ ?>" data-last-ips-mac="<?php echo LR\Filters::escapeHtmlAttr($wewimoOneDevice['ip']) /* line 166 */ ?>,<?php
							echo LR\Filters::escapeHtmlAttr($interfaceName) /* line 166 */ ?>,<?php echo LR\Filters::escapeHtmlAttr($row['mac-address']) /* line 166 */ ?>"<?php
							if ($_tmp = array_filter([$stationsIterator->odd ? 'manual-stripes-odd' : NULL])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>>
                                    <td colspan="13" style="border-bottom: none; border-top: none"></td>
                                    <td colspan="2" style="text-align:right; color:#bfbfbf;"><?php echo LR\Filters::escapeHtmlText($lastIp['w_timestamp']) /* line 168 */ ?></td>
                                    <td>
<?php
							if ($lastIp['xx-last-ip-link']) {
								?>                                            <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($lastIp['xx-last-ip-link'])) /* line 171 */ ?>"><?php
								echo LR\Filters::escapeHtmlText($lastIp['last-ip']) /* line 171 */ ?></a>
<?php
							}
							else {
								?>                                            <?php echo LR\Filters::escapeHtmlText($lastIp['last-ip']) /* line 173 */ ?>

<?php
							}
?>
                                    </td>
                                    <td><?php echo LR\Filters::escapeHtmlText($lastIp['xx-last-ip-host']) /* line 176 */ ?></td>
                                    <td style="border-bottom: none; border-top: none"></td>
                                </tr>
<?php
							$iterations++;
						}
						$iterations++;
					}
					array_pop($this->global->its);
					$iterator = end($this->global->its);
				}
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
			$this->global->snippetDriver->leave();
?>            </tbody>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
    </table>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
