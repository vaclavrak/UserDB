<?php
// source: /opt/userdb/app/config/config.neon 
// source: /opt/userdb/app/config/config.local.neon 

class Container_4c11ccbd55 extends Nette\DI\Container
{
	protected $meta = [
		'types' => [
			'Nette\Application\Application' => [1 => ['application.application']],
			'Nette\Application\IPresenterFactory' => [1 => ['application.presenterFactory']],
			'Nette\Application\LinkGenerator' => [1 => ['application.linkGenerator']],
			'Nette\Caching\Storages\IJournal' => [1 => ['cache.journal']],
			'Nette\Caching\IStorage' => [1 => ['cache.storage']],
			'Nette\Database\Connection' => [1 => ['database.default.connection']],
			'Nette\Database\IStructure' => [1 => ['database.default.structure']],
			'Nette\Database\Structure' => [1 => ['database.default.structure']],
			'Nette\Database\IConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Conventions\DiscoveredConventions' => [1 => ['database.default.conventions']],
			'Nette\Database\Context' => [1 => ['database.default.context']],
			'Nette\Http\RequestFactory' => [1 => ['http.requestFactory']],
			'Nette\Http\IRequest' => [1 => ['http.request']],
			'Nette\Http\Request' => [1 => ['http.request']],
			'Nette\Http\IResponse' => [1 => ['http.response']],
			'Nette\Http\Response' => [1 => ['http.response']],
			'Nette\Http\Context' => [1 => ['http.context']],
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => [1 => ['latte.latteFactory']],
			'Nette\Application\UI\ITemplateFactory' => [1 => ['latte.templateFactory']],
			'Nette\Mail\IMailer' => [1 => ['mail.mailer']],
			'Nette\Security\Passwords' => [1 => ['security.passwords']],
			'Nette\Security\IUserStorage' => [1 => ['security.userStorage']],
			'Nette\Security\User' => [1 => ['security.user']],
			'Nette\Http\Session' => [1 => ['session.session']],
			'Tracy\ILogger' => [1 => ['tracy.logger']],
			'Tracy\BlueScreen' => [1 => ['tracy.blueScreen']],
			'Tracy\Bar' => [1 => ['tracy.bar']],
			'IteratorAggregate' => [1 => ['console.helperSet', 'routing.router']],
			'Traversable' => [1 => ['console.helperSet', 'routing.router']],
			'Symfony\Component\Console\Helper\HelperSet' => [1 => ['console.helperSet']],
			'Symfony\Component\Console\Application' => [1 => ['console.application']],
			'Kdyby\Console\Application' => [1 => ['console.application']],
			'Nette\Application\IRouter' => [['console.router', 'console.originalRouter'], ['routing.router']],
			'Kdyby\Console\CliRouter' => [['console.router']],
			'Symfony\Component\Console\Command\Command' => [
				[
					'console.command.0',
					'console.command.1',
					'migrations.continueCommand',
					'migrations.createCommand',
					'migrations.resetCommand',
				],
			],
			'App\Console\UpdateLocationsCommand' => [['console.command.0']],
			'App\Console\Wewimo2InfluxCommand' => [['console.command.1']],
			'Nextras\Migrations\IDbal' => [1 => ['migrations.dbal']],
			'Nextras\Migrations\IDriver' => [1 => ['migrations.driver']],
			'Nextras\Migrations\Bridges\SymfonyConsole\BaseCommand' => [['migrations.continueCommand', 'migrations.createCommand', 'migrations.resetCommand']],
			'Nextras\Migrations\Bridges\SymfonyConsole\ContinueCommand' => [1 => ['migrations.continueCommand']],
			'Nextras\Migrations\Bridges\SymfonyConsole\CreateCommand' => [1 => ['migrations.createCommand']],
			'Nextras\Migrations\Bridges\SymfonyConsole\ResetCommand' => [1 => ['migrations.resetCommand']],
			'App\Components\LogTableFactory' => [1 => ['logTableFactory']],
			'App\Model\Table' => [
				1 => [
					'ap',
					'apiKlic',
					'aplikaceLog',
					'aplikaceToken',
					'cestneClenstviUzivatele',
					'dnat',
					'log',
					'oblast',
					'odchoziPlatba',
					'povoleneSMTP',
					'prichoziPlatba',
					'sloucenyUzivatel',
					'spravceOblasti',
					'stavBankovnihoUctu',
					'subnet',
					'technologiePripojeni',
					'typCestnehoClenstvi',
					'typClenstvi',
					'typPravniFormyUzivatele',
					'typSpravceOblasti',
					'typZarizeni',
					'uzivatel',
					'uzivatelskeKonto',
					'zpusobPripojeni',
					'cc',
					'ipAdresa',
				],
			],
			'App\Model\AP' => [1 => ['ap']],
			'App\Model\AccountActivation' => [1 => ['accountActivation']],
			'App\Model\ApiKlic' => [1 => ['apiKlic']],
			'App\Model\AplikaceLog' => [1 => ['aplikaceLog']],
			'App\Model\AplikaceToken' => [1 => ['aplikaceToken']],
			'App\Model\CestneClenstviUzivatele' => [1 => ['cestneClenstviUzivatele']],
			'App\Model\DNat' => [1 => ['dnat']],
			'App\Model\Log' => [1 => ['log']],
			'App\Model\Oblast' => [1 => ['oblast']],
			'App\Model\OdchoziPlatba' => [1 => ['odchoziPlatba']],
			'App\Model\PovoleneSMTP' => [1 => ['povoleneSMTP']],
			'App\Model\PrichoziPlatba' => [1 => ['prichoziPlatba']],
			'App\Model\SloucenyUzivatel' => [1 => ['sloucenyUzivatel']],
			'App\Model\SpravceOblasti' => [1 => ['spravceOblasti']],
			'App\Model\StavBankovnihoUctu' => [1 => ['stavBankovnihoUctu']],
			'App\Model\Subnet' => [1 => ['subnet']],
			'App\Model\TechnologiePripojeni' => [1 => ['technologiePripojeni']],
			'App\Model\TypCestnehoClenstvi' => [1 => ['typCestnehoClenstvi']],
			'App\Model\TypClenstvi' => [1 => ['typClenstvi']],
			'App\Model\TypPravniFormyUzivatele' => [1 => ['typPravniFormyUzivatele']],
			'App\Model\TypSpravceOblasti' => [1 => ['typSpravceOblasti']],
			'App\Model\TypZarizeni' => [1 => ['typZarizeni']],
			'App\Model\Uzivatel' => [1 => ['uzivatel']],
			'App\Model\UzivatelListGrid' => [1 => ['uzivatelListGrid']],
			'App\Model\UzivatelskeKonto' => [1 => ['uzivatelskeKonto']],
			'App\Model\Wewimo' => [1 => ['wewimo']],
			'App\Model\ZpusobPripojeni' => [1 => ['zpusobPripojeni']],
			'App\Model\cc' => [1 => ['cc']],
			'App\RouterFactory' => [1 => ['64_App_RouterFactory']],
			'App\Services\MailService' => [1 => ['mailService']],
			'App\Services\PdfGenerator' => [1 => ['pdfGenerator']],
			'App\Presenters\BasePresenter' => [
				1 => [
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
				],
			],
			'Nette\Application\UI\Presenter' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\Application\UI\Control' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\Application\UI\Component' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\ComponentModel\Container' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\ComponentModel\Component' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\Application\UI\IRenderable' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\ComponentModel\IContainer' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\ComponentModel\IComponent' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\Application\UI\ISignalReceiver' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'Nette\Application\UI\IStatePersistent' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
				],
			],
			'ArrayAccess' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
					'routing.router',
				],
			],
			'Nette\Application\IPresenter' => [
				[
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'application.18',
					'application.19',
					'application.20',
					'application.21',
					'application.22',
					'application.23',
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
					'application.33',
					'application.34',
					'application.35',
				],
			],
			'App\Presenters\SpravaPresenter' => [
				1 => [
					'SpravaPresenter',
					'application.1',
					'application.2',
					'application.5',
					'application.7',
					'application.8',
					'application.10',
					'application.13',
					'application.15',
					'application.22',
					'application.23',
				],
			],
			'App\Services\SmsSender' => [1 => ['smsSender']],
			'App\Model\Parameters' => [1 => ['parameters']],
			'Nette\Security\IAuthenticator' => [1 => ['authenticator']],
			'App\Model\Authenticator' => [1 => ['authenticator']],
			'App\Services\CryptoSluzba' => [1 => ['cryptoSluzba']],
			'App\Model\Sojka' => [1 => ['sojka']],
			'App\Model\IPAdresa' => [1 => ['ipAdresa']],
			'App\Model\IdsConnector' => [1 => ['idsConnector']],
			'App\Presenters\SpravaSifrovaniPresenter' => [1 => ['application.1']],
			'App\Presenters\SpravaUctuPresenter' => [1 => ['application.2']],
			'App\Presenters\ApPresenter' => [1 => ['application.3']],
			'App\Presenters\HomepagePresenter' => [1 => ['application.4']],
			'App\Presenters\SpravaSmsPresenter' => [1 => ['application.5']],
			'App\Presenters\UzivatelPresenter' => [
				1 => ['application.6', 'application.9', 'application.11', 'application.19', 'application.21'],
			],
			'App\Presenters\UzivatelAccountPresenter' => [1 => ['application.6']],
			'App\Presenters\SpravaOblastiPresenter' => [1 => ['application.7']],
			'App\Presenters\SpravaSlucovaniPresenter' => [1 => ['application.8']],
			'App\Presenters\UzivatelMailSmsPresenter' => [1 => ['application.9']],
			'App\Presenters\SpravaMailuPresenter' => [1 => ['application.10']],
			'App\Presenters\UzivatelActionsPresenter' => [1 => ['application.11']],
			'App\Presenters\ErrorPresenter' => [1 => ['application.12']],
			'App\Presenters\SpravaCcPresenter' => [1 => ['application.13']],
			'App\Presenters\WewimoPresenter' => [1 => ['application.14']],
			'App\Presenters\SpravaPlatebPresenter' => [1 => ['application.15']],
			'App\Presenters\FilePresenter' => [1 => ['application.16']],
			'App\Presenters\UzivatelListPresenter' => [1 => ['application.17']],
			'App\Presenters\AjaxApiPresenter' => [1 => ['application.18']],
			'App\Presenters\SubnetPresenter' => [1 => ['application.20']],
			'App\Presenters\UzivatelRightsCcPresenter' => [1 => ['application.21']],
			'App\Presenters\SpravaGrafuPresenter' => [1 => ['application.22']],
			'App\Presenters\SpravaNesparovanychPresenter' => [1 => ['application.23']],
			'App\ApiModule\Presenters\ApiPresenter' => [
				1 => [
					'application.24',
					'application.25',
					'application.26',
					'application.27',
					'application.28',
					'application.29',
					'application.30',
					'application.31',
					'application.32',
				],
			],
			'App\ApiModule\Presenters\PasswordPresenter' => [1 => ['application.24']],
			'App\ApiModule\Presenters\HealthCheckPresenter' => [1 => ['application.26']],
			'App\ApiModule\Presenters\AppPresenter' => [1 => ['application.27']],
			'App\ApiModule\Presenters\IdsPresenter' => [1 => ['application.28']],
			'App\ApiModule\Presenters\WewimoPresenter' => [1 => ['application.29']],
			'App\ApiModule\Presenters\DeviceDbPresenter' => [1 => ['application.30']],
			'App\ApiModule\Presenters\SmokepingPresenter' => [1 => ['application.31']],
			'App\ApiModule\Presenters\AreasPresenter' => [1 => ['application.32']],
			'KdybyModule\CliPresenter' => [1 => ['application.33']],
			'NetteModule\ErrorPresenter' => [1 => ['application.34']],
			'NetteModule\MicroPresenter' => [1 => ['application.35']],
			'Nette\Utils\ArrayList' => [1 => ['routing.router']],
			'Countable' => [1 => ['routing.router']],
			'Nette\Application\Routers\RouteList' => [1 => ['routing.router']],
			'Nette\DI\Container' => [1 => ['container']],
		],
		'services' => [
			'64_App_RouterFactory' => 'App\RouterFactory',
			'SpravaPresenter' => 'App\Presenters\SpravaPresenter',
			'accountActivation' => 'App\Model\AccountActivation',
			'ap' => 'App\Model\AP',
			'apiKlic' => 'App\Model\ApiKlic',
			'aplikaceLog' => 'App\Model\AplikaceLog',
			'aplikaceToken' => 'App\Model\AplikaceToken',
			'application.1' => 'App\Presenters\SpravaSifrovaniPresenter',
			'application.10' => 'App\Presenters\SpravaMailuPresenter',
			'application.11' => 'App\Presenters\UzivatelActionsPresenter',
			'application.12' => 'App\Presenters\ErrorPresenter',
			'application.13' => 'App\Presenters\SpravaCcPresenter',
			'application.14' => 'App\Presenters\WewimoPresenter',
			'application.15' => 'App\Presenters\SpravaPlatebPresenter',
			'application.16' => 'App\Presenters\FilePresenter',
			'application.17' => 'App\Presenters\UzivatelListPresenter',
			'application.18' => 'App\Presenters\AjaxApiPresenter',
			'application.19' => 'App\Presenters\UzivatelPresenter',
			'application.2' => 'App\Presenters\SpravaUctuPresenter',
			'application.20' => 'App\Presenters\SubnetPresenter',
			'application.21' => 'App\Presenters\UzivatelRightsCcPresenter',
			'application.22' => 'App\Presenters\SpravaGrafuPresenter',
			'application.23' => 'App\Presenters\SpravaNesparovanychPresenter',
			'application.24' => 'App\ApiModule\Presenters\PasswordPresenter',
			'application.25' => 'App\ApiModule\Presenters\ApiPresenter',
			'application.26' => 'App\ApiModule\Presenters\HealthCheckPresenter',
			'application.27' => 'App\ApiModule\Presenters\AppPresenter',
			'application.28' => 'App\ApiModule\Presenters\IdsPresenter',
			'application.29' => 'App\ApiModule\Presenters\WewimoPresenter',
			'application.3' => 'App\Presenters\ApPresenter',
			'application.30' => 'App\ApiModule\Presenters\DeviceDbPresenter',
			'application.31' => 'App\ApiModule\Presenters\SmokepingPresenter',
			'application.32' => 'App\ApiModule\Presenters\AreasPresenter',
			'application.33' => 'KdybyModule\CliPresenter',
			'application.34' => 'NetteModule\ErrorPresenter',
			'application.35' => 'NetteModule\MicroPresenter',
			'application.4' => 'App\Presenters\HomepagePresenter',
			'application.5' => 'App\Presenters\SpravaSmsPresenter',
			'application.6' => 'App\Presenters\UzivatelAccountPresenter',
			'application.7' => 'App\Presenters\SpravaOblastiPresenter',
			'application.8' => 'App\Presenters\SpravaSlucovaniPresenter',
			'application.9' => 'App\Presenters\UzivatelMailSmsPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'authenticator' => 'App\Model\Authenticator',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'cc' => 'App\Model\cc',
			'cestneClenstviUzivatele' => 'App\Model\CestneClenstviUzivatele',
			'console.application' => 'Kdyby\Console\Application',
			'console.command.0' => 'App\Console\UpdateLocationsCommand',
			'console.command.1' => 'App\Console\Wewimo2InfluxCommand',
			'console.helperSet' => 'Symfony\Component\Console\Helper\HelperSet',
			'console.originalRouter' => 'Nette\Application\IRouter',
			'console.router' => 'Kdyby\Console\CliRouter',
			'container' => 'Nette\DI\Container',
			'cryptoSluzba' => 'App\Services\CryptoSluzba',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'dnat' => 'App\Model\DNat',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'idsConnector' => 'App\Model\IdsConnector',
			'ipAdresa' => 'App\Model\IPAdresa',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'log' => 'App\Model\Log',
			'logTableFactory' => 'App\Components\LogTableFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'mailService' => 'App\Services\MailService',
			'migrations.continueCommand' => 'Nextras\Migrations\Bridges\SymfonyConsole\ContinueCommand',
			'migrations.createCommand' => 'Nextras\Migrations\Bridges\SymfonyConsole\CreateCommand',
			'migrations.dbal' => 'Nextras\Migrations\IDbal',
			'migrations.driver' => 'Nextras\Migrations\IDriver',
			'migrations.resetCommand' => 'Nextras\Migrations\Bridges\SymfonyConsole\ResetCommand',
			'oblast' => 'App\Model\Oblast',
			'odchoziPlatba' => 'App\Model\OdchoziPlatba',
			'parameters' => 'App\Model\Parameters',
			'pdfGenerator' => 'App\Services\PdfGenerator',
			'povoleneSMTP' => 'App\Model\PovoleneSMTP',
			'prichoziPlatba' => 'App\Model\PrichoziPlatba',
			'routing.router' => 'Nette\Application\Routers\RouteList',
			'security.passwords' => 'Nette\Security\Passwords',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'sloucenyUzivatel' => 'App\Model\SloucenyUzivatel',
			'smsSender' => 'App\Services\SmsSender',
			'sojka' => 'App\Model\Sojka',
			'spravceOblasti' => 'App\Model\SpravceOblasti',
			'stavBankovnihoUctu' => 'App\Model\StavBankovnihoUctu',
			'subnet' => 'App\Model\Subnet',
			'technologiePripojeni' => 'App\Model\TechnologiePripojeni',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
			'typCestnehoClenstvi' => 'App\Model\TypCestnehoClenstvi',
			'typClenstvi' => 'App\Model\TypClenstvi',
			'typPravniFormyUzivatele' => 'App\Model\TypPravniFormyUzivatele',
			'typSpravceOblasti' => 'App\Model\TypSpravceOblasti',
			'typZarizeni' => 'App\Model\TypZarizeni',
			'uzivatel' => 'App\Model\Uzivatel',
			'uzivatelListGrid' => 'App\Model\UzivatelListGrid',
			'uzivatelskeKonto' => 'App\Model\UzivatelskeKonto',
			'wewimo' => 'App\Model\Wewimo',
			'zpusobPripojeni' => 'App\Model\ZpusobPripojeni',
		],
		'tags' => [
			'inject' => [
				'SpravaPresenter' => true,
				'application.1' => true,
				'application.10' => true,
				'application.11' => true,
				'application.12' => true,
				'application.13' => true,
				'application.14' => true,
				'application.15' => true,
				'application.16' => true,
				'application.17' => true,
				'application.18' => true,
				'application.19' => true,
				'application.2' => true,
				'application.20' => true,
				'application.21' => true,
				'application.22' => true,
				'application.23' => true,
				'application.24' => true,
				'application.25' => true,
				'application.26' => true,
				'application.27' => true,
				'application.28' => true,
				'application.29' => true,
				'application.3' => true,
				'application.30' => true,
				'application.31' => true,
				'application.32' => true,
				'application.33' => true,
				'application.34' => true,
				'application.35' => true,
				'application.4' => true,
				'application.5' => true,
				'application.6' => true,
				'application.7' => true,
				'application.8' => true,
				'application.9' => true,
			],
			'nette.presenter' => [
				'SpravaPresenter' => 'App\Presenters\SpravaPresenter',
				'application.1' => 'App\Presenters\SpravaSifrovaniPresenter',
				'application.10' => 'App\Presenters\SpravaMailuPresenter',
				'application.11' => 'App\Presenters\UzivatelActionsPresenter',
				'application.12' => 'App\Presenters\ErrorPresenter',
				'application.13' => 'App\Presenters\SpravaCcPresenter',
				'application.14' => 'App\Presenters\WewimoPresenter',
				'application.15' => 'App\Presenters\SpravaPlatebPresenter',
				'application.16' => 'App\Presenters\FilePresenter',
				'application.17' => 'App\Presenters\UzivatelListPresenter',
				'application.18' => 'App\Presenters\AjaxApiPresenter',
				'application.19' => 'App\Presenters\UzivatelPresenter',
				'application.2' => 'App\Presenters\SpravaUctuPresenter',
				'application.20' => 'App\Presenters\SubnetPresenter',
				'application.21' => 'App\Presenters\UzivatelRightsCcPresenter',
				'application.22' => 'App\Presenters\SpravaGrafuPresenter',
				'application.23' => 'App\Presenters\SpravaNesparovanychPresenter',
				'application.24' => 'App\ApiModule\Presenters\PasswordPresenter',
				'application.25' => 'App\ApiModule\Presenters\ApiPresenter',
				'application.26' => 'App\ApiModule\Presenters\HealthCheckPresenter',
				'application.27' => 'App\ApiModule\Presenters\AppPresenter',
				'application.28' => 'App\ApiModule\Presenters\IdsPresenter',
				'application.29' => 'App\ApiModule\Presenters\WewimoPresenter',
				'application.3' => 'App\Presenters\ApPresenter',
				'application.30' => 'App\ApiModule\Presenters\DeviceDbPresenter',
				'application.31' => 'App\ApiModule\Presenters\SmokepingPresenter',
				'application.32' => 'App\ApiModule\Presenters\AreasPresenter',
				'application.33' => 'KdybyModule\CliPresenter',
				'application.34' => 'NetteModule\ErrorPresenter',
				'application.35' => 'NetteModule\MicroPresenter',
				'application.4' => 'App\Presenters\HomepagePresenter',
				'application.5' => 'App\Presenters\SpravaSmsPresenter',
				'application.6' => 'App\Presenters\UzivatelAccountPresenter',
				'application.7' => 'App\Presenters\SpravaOblastiPresenter',
				'application.8' => 'App\Presenters\SpravaSlucovaniPresenter',
				'application.9' => 'App\Presenters\UzivatelMailSmsPresenter',
			],
			'kdyby.console.command' => [
				'console.command.0' => true,
				'console.command.1' => true,
				'migrations.continueCommand' => true,
				'migrations.createCommand' => true,
				'migrations.resetCommand' => true,
			],
		],
		'aliases' => [
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		],
	];


	public function __construct(array $params = [])
	{
		$this->parameters = $params;
		$this->parameters += [
			'appDir' => '/opt/userdb/app',
			'wwwDir' => '/opt/userdb/www',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => true,
			'tempDir' => '/opt/userdb/app/../temp',
			'env' => [
				'PATH' => '/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin',
				'HOSTNAME' => 'fee08f58a2bf',
				'TRACY_ENABLE' => '1',
				'USERDB_SALT' => 'saltvalue',
				'USERDB_GOOGLE_MAPS_KEY' => 'xxx',
				'USERDB_DB_HOST' => 'db',
				'USERDB_DB_NAME' => 'userdb',
				'USERDB_DB_USERNAME' => 'root',
				'USERDB_DB_PASSWORD' => 'rootpwd654',
				'USERDB_ENCRYPTION_PASSPHRASE' => 'def000003f80fda926649189d52b4024641f8fa97d1be88638aa8f8c0bec00fdfd756e344f7547db517b17a5ea67085d9de8c88c806795bdec825f8df8b47e6dbb87ec03',
				'USERDB_IDS_USERNAME' => 'api',
				'USERDB_IDS_PASSWORD' => 'xxx',
				'USERDB_IDS_IPS_WHITELIST' => '10.107.99.188',
				'INFLUX_URL' => 'influxdb://wewimo:xxx@10.107.252.101:8086/wewimo',
				'PHPIZE_DEPS' => 'autoconf 		dpkg-dev 		file 		g++ 		gcc 		libc-dev 		make 		pkg-config 		re2c',
				'PHP_INI_DIR' => '/usr/local/etc/php',
				'APACHE_CONFDIR' => '/etc/apache2',
				'APACHE_ENVVARS' => '/etc/apache2/envvars',
				'PHP_EXTRA_BUILD_DEPS' => 'apache2-dev',
				'PHP_EXTRA_CONFIGURE_ARGS' => '--with-apxs2 --disable-cgi',
				'PHP_CFLAGS' => '-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64',
				'PHP_CPPFLAGS' => '-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64',
				'PHP_LDFLAGS' => '-Wl,-O1 -pie',
				'GPG_KEYS' => '1729F83938DA44E27BA0F4D3DBDB397470D12172 B1B44D8F021E4E2D6021E995DC9FF8D3EE5AF27F',
				'PHP_VERSION' => '7.2.34',
				'PHP_URL' => 'https://www.php.net/distributions/php-7.2.34.tar.xz',
				'PHP_ASC_URL' => 'https://www.php.net/distributions/php-7.2.34.tar.xz.asc',
				'PHP_SHA256' => '409e11bc6a2c18707dfc44bc61c820ddfd81e17481470f3405ee7822d8379903',
				'HOME' => '/root',
			],
			'clenskyPrispevek' => 290,
			'igw1IpCheckerUrl' => 'http://localhost/',
			'igw2IpCheckerUrl' => 'http://localhost/',
			'urlPrefix' => '/userdb',
			'sojkaPingerURL' => 'http://sojka.hkfree.org/pinger/',
			'salt' => 'saltvalue',
			'influxUrl' => 'influxdb://wewimo:xxx@10.107.252.101:8086/wewimo',
			'googleMapsApiKey' => 'xxx',
			'debug' => ['fakeUser' => ['userID' => 1, 'userName' => 'tester', 'passwordHash' => 'xxx'], 'tracy' => true],
			'https' => false,
		];
	}


	public function createService__64_App_RouterFactory(): App\RouterFactory
	{
		$service = new App\RouterFactory;
		return $service;
	}


	public function createService__SpravaPresenter(): App\Presenters\SpravaPresenter
	{
		$service = new App\Presenters\SpravaPresenter($this->getService('uzivatel'), $this->getService('ap'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->setGoogleMapsApiKey('xxx');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceAccountActivation(): App\Model\AccountActivation
	{
		$service = new App\Model\AccountActivation(
			$this->getService('parameters'),
			$this->getService('prichoziPlatba'),
			$this->getService('uzivatelskeKonto'),
			$this->getService('uzivatel')
		);
		return $service;
	}


	public function createServiceAp(): App\Model\AP
	{
		$service = new App\Model\AP($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceApiKlic(): App\Model\ApiKlic
	{
		$service = new App\Model\ApiKlic($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceAplikaceLog(): App\Model\AplikaceLog
	{
		$service = new App\Model\AplikaceLog(
			$this->getService('database.default.context'),
			$this->getService('security.user'),
			$this->getService('http.request')
		);
		return $service;
	}


	public function createServiceAplikaceToken(): App\Model\AplikaceToken
	{
		$service = new App\Model\AplikaceToken($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceApplication__1(): App\Presenters\SpravaSifrovaniPresenter
	{
		$service = new App\Presenters\SpravaSifrovaniPresenter($this->getService('cryptoSluzba'), $this->getService('ipAdresa'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__10(): App\Presenters\SpravaMailuPresenter
	{
		$service = new App\Presenters\SpravaMailuPresenter($this->getService('uzivatel'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__11(): App\Presenters\UzivatelActionsPresenter
	{
		$service = new App\Presenters\UzivatelActionsPresenter(
			$this->getService('mailService'),
			$this->getService('pdfGenerator'),
			$this->getService('accountActivation'),
			$this->getService('uzivatel')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__12(): App\Presenters\ErrorPresenter
	{
		$service = new App\Presenters\ErrorPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__13(): App\Presenters\SpravaCcPresenter
	{
		$service = new App\Presenters\SpravaCcPresenter(
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('cc'),
			$this->getService('uzivatel'),
			$this->getService('ap')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__14(): App\Presenters\WewimoPresenter
	{
		$service = new App\Presenters\WewimoPresenter($this->getService('wewimo'), $this->getService('ap'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__15(): App\Presenters\SpravaPlatebPresenter
	{
		$service = new App\Presenters\SpravaPlatebPresenter($this->getService('prichoziPlatba'), $this->getService('odchoziPlatba'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__16(): App\Presenters\FilePresenter
	{
		$service = new App\Presenters\FilePresenter($this->getService('ipAdresa'), $this->getService('ap'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__17(): App\Presenters\UzivatelListPresenter
	{
		$service = new App\Presenters\UzivatelListPresenter(
			$this->getService('uzivatelListGrid'),
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('uzivatel'),
			$this->getService('ap')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__18(): App\Presenters\AjaxApiPresenter
	{
		$service = new App\Presenters\AjaxApiPresenter($this->getService('subnet'), $this->getService('ap'), $this->getService('sojka'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__19(): App\Presenters\UzivatelPresenter
	{
		$service = new App\Presenters\UzivatelPresenter(
			$this->getService('mailService'),
			$this->getService('pdfGenerator'),
			$this->getService('cryptoSluzba'),
			$this->getService('povoleneSMTP'),
			$this->getService('dnat'),
			$this->getService('parameters'),
			$this->getService('sloucenyUzivatel'),
			$this->getService('subnet'),
			$this->getService('spravceOblasti'),
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('typPravniFormyUzivatele'),
			$this->getService('typClenstvi'),
			$this->getService('zpusobPripojeni'),
			$this->getService('technologiePripojeni'),
			$this->getService('uzivatel'),
			$this->getService('ipAdresa'),
			$this->getService('ap'),
			$this->getService('typZarizeni'),
			$this->getService('log'),
			$this->getService('idsConnector'),
			$this->getService('aplikaceToken')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__2(): App\Presenters\SpravaUctuPresenter
	{
		$service = new App\Presenters\SpravaUctuPresenter($this->getService('stavBankovnihoUctu'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__20(): App\Presenters\SubnetPresenter
	{
		$service = new App\Presenters\SubnetPresenter(
			$this->getService('subnet'),
			$this->getService('spravceOblasti'),
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('typSpravceOblasti'),
			$this->getService('typPravniFormyUzivatele'),
			$this->getService('typClenstvi'),
			$this->getService('typCestnehoClenstvi'),
			$this->getService('zpusobPripojeni'),
			$this->getService('technologiePripojeni'),
			$this->getService('uzivatel'),
			$this->getService('ipAdresa'),
			$this->getService('ap'),
			$this->getService('typZarizeni'),
			$this->getService('log')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__21(): App\Presenters\UzivatelRightsCcPresenter
	{
		$service = new App\Presenters\UzivatelRightsCcPresenter(
			$this->getService('ap'),
			$this->getService('uzivatel'),
			$this->getService('typCestnehoClenstvi'),
			$this->getService('typSpravceOblasti'),
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('spravceOblasti'),
			$this->getService('log')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__22(): App\Presenters\SpravaGrafuPresenter
	{
		$service = new App\Presenters\SpravaGrafuPresenter($this->getService('uzivatel'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__23(): App\Presenters\SpravaNesparovanychPresenter
	{
		$service = new App\Presenters\SpravaNesparovanychPresenter($this->getService('prichoziPlatba'), $this->getService('uzivatelskeKonto'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__24(): App\ApiModule\Presenters\PasswordPresenter
	{
		$service = new App\ApiModule\Presenters\PasswordPresenter($this->getService('ipAdresa'), $this->getService('cryptoSluzba'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__25(): App\ApiModule\Presenters\ApiPresenter
	{
		$service = new App\ApiModule\Presenters\ApiPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__26(): App\ApiModule\Presenters\HealthCheckPresenter
	{
		$service = new App\ApiModule\Presenters\HealthCheckPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__27(): App\ApiModule\Presenters\AppPresenter
	{
		$service = new App\ApiModule\Presenters\AppPresenter(
			$this->getService('uzivatel'),
			$this->getService('aplikaceToken'),
			$this->getService('aplikaceLog'),
			$this->getService('ap')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__28(): App\ApiModule\Presenters\IdsPresenter
	{
		$service = new App\ApiModule\Presenters\IdsPresenter($this->getService('idsConnector'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__29(): App\ApiModule\Presenters\WewimoPresenter
	{
		$service = new App\ApiModule\Presenters\WewimoPresenter($this->getService('wewimo'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): App\Presenters\ApPresenter
	{
		$service = new App\Presenters\ApPresenter(
			$this->getService('cryptoSluzba'),
			$this->getService('spravceOblasti'),
			$this->getService('uzivatel'),
			$this->getService('ap'),
			$this->getService('ipAdresa'),
			$this->getService('subnet'),
			$this->getService('typZarizeni'),
			$this->getService('log'),
			$this->getService('apiKlic'),
			$this->getService('idsConnector')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__30(): App\ApiModule\Presenters\DeviceDbPresenter
	{
		$service = new App\ApiModule\Presenters\DeviceDbPresenter($this->getService('oblast'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__31(): App\ApiModule\Presenters\SmokepingPresenter
	{
		$service = new App\ApiModule\Presenters\SmokepingPresenter(
			$this->getService('oblast'),
			$this->getService('uzivatel'),
			$this->getService('ipAdresa'),
			$this->getService('ap')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__32(): App\ApiModule\Presenters\AreasPresenter
	{
		$service = new App\ApiModule\Presenters\AreasPresenter($this->getService('oblast'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectApiKlicModel($this->getService('apiKlic'));
		$service->injectHttpRequest($this->getService('http.request'));
		$service->injectHttpResponse($this->getService('http.response'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__33(): KdybyModule\CliPresenter
	{
		$service = new KdybyModule\CliPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->injectConsole($this->getService('console.application'), $this->getService('application.application'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__34(): NetteModule\ErrorPresenter
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	public function createServiceApplication__35(): NetteModule\MicroPresenter
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('routing.router'));
		return $service;
	}


	public function createServiceApplication__4(): App\Presenters\HomepagePresenter
	{
		$service = new App\Presenters\HomepagePresenter($this->getService('uzivatel'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__5(): App\Presenters\SpravaSmsPresenter
	{
		$service = new App\Presenters\SpravaSmsPresenter($this->getService('spravceOblasti'), $this->getService('smsSender'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__6(): App\Presenters\UzivatelAccountPresenter
	{
		$service = new App\Presenters\UzivatelAccountPresenter(
			$this->getService('uzivatelskeKonto'),
			$this->getService('uzivatel'),
			$this->getService('ap'),
			$this->getService('prichoziPlatba')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__7(): App\Presenters\SpravaOblastiPresenter
	{
		$service = new App\Presenters\SpravaOblastiPresenter($this->getService('oblast'), $this->getService('ap'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__8(): App\Presenters\SpravaSlucovaniPresenter
	{
		$service = new App\Presenters\SpravaSlucovaniPresenter(
			$this->getService('sloucenyUzivatel'),
			$this->getService('uzivatel'),
			$this->getService('log'),
			$this->getService('ipAdresa'),
			$this->getService('cestneClenstviUzivatele')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__9(): App\Presenters\UzivatelMailSmsPresenter
	{
		$service = new App\Presenters\UzivatelMailSmsPresenter($this->getService('uzivatel'), $this->getService('ap'), $this->getService('smsSender'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->inject(
			$this->getService('oblast'),
			$this->getService('spravceOblasti'),
			$this->getService('ap'),
			$this->getService('mail.mailer')
		);
		$service->logTableFactory = $this->getService('logTableFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('http.response')
		);
		$service->catchExceptions = false;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('routing.router'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory')
		));
		$self = $this; $service->onError[] = function ($app, $e) use ($self) {
			$app->errorPresenter = false;
			$app->onShutdown[] = function () { exit(254); };
		};
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		$service = new Nette\Application\LinkGenerator(
			$this->getService('routing.router'),
			$this->getService('http.request')->getUrl(),
			$this->getService('application.presenterFactory')
		);
		return $service;
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, '/opt/userdb/app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		if (method_exists($service, 'setMapping')) { $service->setMapping(['Kdyby' => 'KdybyModule\*\*Presenter']); };
		return $service;
	}


	public function createServiceAuthenticator(): App\Model\Authenticator
	{
		$service = new App\Model\Authenticator(
			['userID' => 1, 'userName' => 'tester', 'passwordHash' => 'xxx'],
			$this->getService('database.default.context')
		);
		return $service;
	}


	public function createServiceCache__journal(): Nette\Caching\Storages\IJournal
	{
		$service = new Nette\Caching\Storages\SQLiteJournal('/opt/userdb/app/../temp/cache/journal.s3db');
		return $service;
	}


	public function createServiceCache__storage(): Nette\Caching\IStorage
	{
		$service = new Nette\Caching\Storages\FileStorage('/opt/userdb/app/../temp/cache', $this->getService('cache.journal'));
		return $service;
	}


	public function createServiceCc(): App\Model\cc
	{
		$service = new App\Model\cc($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceCestneClenstviUzivatele(): App\Model\CestneClenstviUzivatele
	{
		$service = new App\Model\CestneClenstviUzivatele($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceConsole__application(): Kdyby\Console\Application
	{
		$service = new Kdyby\Console\Application('Nette Framework', '2.4');
		$service->setHelperSet($this->getService('console.helperSet'));
		$service->injectServiceLocator($this);
		$service->add($this->getService('console.command.0'));
		$service->add($this->getService('console.command.1'));
		$service->add($this->getService('migrations.continueCommand'));
		$service->add($this->getService('migrations.createCommand'));
		$service->add($this->getService('migrations.resetCommand'));
		return $service;
	}


	public function createServiceConsole__command__0(): App\Console\UpdateLocationsCommand
	{
		$service = new App\Console\UpdateLocationsCommand;
		return $service;
	}


	public function createServiceConsole__command__1(): App\Console\Wewimo2InfluxCommand
	{
		$service = new App\Console\Wewimo2InfluxCommand($this->getService('ap'), $this->getService('wewimo'));
		return $service;
	}


	public function createServiceConsole__helperSet(): Symfony\Component\Console\Helper\HelperSet
	{
		$service = new Symfony\Component\Console\Helper\HelperSet;
		$service->set(new Symfony\Component\Console\Helper\ProcessHelper);
		$service->set(new Symfony\Component\Console\Helper\DescriptorHelper);
		$service->set(new Symfony\Component\Console\Helper\FormatterHelper);
		$service->set(new Symfony\Component\Console\Helper\QuestionHelper);
		$service->set(new Symfony\Component\Console\Helper\DebugFormatterHelper);
		$service->set(new Kdyby\Console\Helpers\PresenterHelper($this->getService('application.application')));
		$service->set(new Kdyby\Console\ContainerHelper($this), 'dic');
		return $service;
	}


	public function createServiceConsole__originalRouter(): Nette\Application\IRouter
	{
		$service = $this->getService('64_App_RouterFactory')->createRouter('/userdb');
		return $service;
	}


	public function createServiceConsole__router(): Kdyby\Console\CliRouter
	{
		$service = new Kdyby\Console\CliRouter;
		return $service;
	}


	public function createServiceContainer(): Nette\DI\Container
	{
		return $this;
	}


	public function createServiceCryptoSluzba(): App\Services\CryptoSluzba
	{
		$service = new App\Services\CryptoSluzba('def000003f80fda926649189d52b4024641f8fa97d1be88638aa8f8c0bec00fdfd756e344f7547db517b17a5ea67085d9de8c88c806795bdec825f8df8b47e6dbb87ec03');
		return $service;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('mysql:host=db;dbname=userdb', 'root', 'rootpwd654', ['lazy' => true]);
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, true, 'default');
		return $service;
	}


	public function createServiceDatabase__default__context(): Nette\Database\Context
	{
		$service = new Nette\Database\Context(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage')
		);
		return $service;
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
		return $service;
	}


	public function createServiceDnat(): App\Model\DNat
	{
		$service = new App\Model\DNat($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceHttp__context(): Nette\Http\Context
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		trigger_error('Service http.context is deprecated.', 16384);
		return $service;
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		return $service;
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy('172.17.0.0/16');
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	public function createServiceIdsConnector(): App\Model\IdsConnector
	{
		$service = new App\Model\IdsConnector('https://10.107.252.102', 'api', 'xxx', '10.107.99.188');
		return $service;
	}


	public function createServiceIpAdresa(): App\Model\IPAdresa
	{
		$service = new App\Model\IPAdresa(
			'http://localhost/',
			'http://localhost/',
			$this->getService('cryptoSluzba'),
			$this->getService('database.default.context'),
			$this->getService('security.user')
		);
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\ILatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\ILatteFactory {
			private $container;


			public function __construct(Container_4c11ccbd55 $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/opt/userdb/app/../temp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setContentType('html');
				Nette\Utils\Html::$xhtml = false;
				$service->onCompile[] = function ($engine) { App\Model\MyMacroSet::install($engine->getCompiler()); };
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Application\UI\ITemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage'),
			null
		);
		return $service;
	}


	public function createServiceLog(): App\Model\Log
	{
		$service = new App\Model\Log(
			$this->getService('database.default.context'),
			$this->getService('security.user'),
			$this->getService('typZarizeni'),
			$this->getService('http.request')
		);
		return $service;
	}


	public function createServiceLogTableFactory(): App\Components\LogTableFactory
	{
		$service = new App\Components\LogTableFactory($this->getService('ipAdresa'), $this->getService('subnet'), $this->getService('log'));
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\IMailer
	{
		$service = new Nette\Mail\SmtpMailer([
			'smtp' => true,
			'host' => 'smtp.hkfree.org',
			'port' => null,
			'username' => null,
			'password' => null,
			'secure' => null,
			'timeout' => null,
			'clientHost' => null,
		]);
		return $service;
	}


	public function createServiceMailService(): App\Services\MailService
	{
		$service = new App\Services\MailService($this->getService('mail.mailer'), $this->getService('uzivatel'));
		return $service;
	}


	public function createServiceMigrations__continueCommand(): Nextras\Migrations\Bridges\SymfonyConsole\ContinueCommand
	{
		$service = new Nextras\Migrations\Bridges\SymfonyConsole\ContinueCommand($this->getService('migrations.driver'), '/opt/userdb/app/../db', []);
		return $service;
	}


	public function createServiceMigrations__createCommand(): Nextras\Migrations\Bridges\SymfonyConsole\CreateCommand
	{
		$service = new Nextras\Migrations\Bridges\SymfonyConsole\CreateCommand($this->getService('migrations.driver'), '/opt/userdb/app/../db', []);
		return $service;
	}


	public function createServiceMigrations__dbal(): Nextras\Migrations\IDbal
	{
		$service = new Nextras\Migrations\Bridges\NetteDatabase\NetteAdapter($this->getService('database.default.connection'));
		return $service;
	}


	public function createServiceMigrations__driver(): Nextras\Migrations\IDriver
	{
		$service = new Nextras\Migrations\Drivers\MySqlDriver($this->getService('migrations.dbal'));
		return $service;
	}


	public function createServiceMigrations__resetCommand(): Nextras\Migrations\Bridges\SymfonyConsole\ResetCommand
	{
		$service = new Nextras\Migrations\Bridges\SymfonyConsole\ResetCommand($this->getService('migrations.driver'), '/opt/userdb/app/../db', []);
		return $service;
	}


	public function createServiceOblast(): App\Model\Oblast
	{
		$service = new App\Model\Oblast($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceOdchoziPlatba(): App\Model\OdchoziPlatba
	{
		$service = new App\Model\OdchoziPlatba($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceParameters(): App\Model\Parameters
	{
		$service = new App\Model\Parameters(290);
		return $service;
	}


	public function createServicePdfGenerator(): App\Services\PdfGenerator
	{
		$service = new App\Services\PdfGenerator($this->getService('subnet'));
		return $service;
	}


	public function createServicePovoleneSMTP(): App\Model\PovoleneSMTP
	{
		$service = new App\Model\PovoleneSMTP($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServicePrichoziPlatba(): App\Model\PrichoziPlatba
	{
		$service = new App\Model\PrichoziPlatba($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceRouting__router(): Nette\Application\Routers\RouteList
	{
		$service = new Nette\Application\Routers\RouteList;
		$service->offsetSet(null, $this->getService('console.router'));
		$service->offsetSet(null, $this->getService('console.originalRouter'));
		return $service;
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		$service = new Nette\Security\Passwords;
		return $service;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('authenticator'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\IUserStorage
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	public function createServiceSloucenyUzivatel(): App\Model\SloucenyUzivatel
	{
		$service = new App\Model\SloucenyUzivatel($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceSmsSender(): App\Services\SmsSender
	{
		$service = new App\Services\SmsSender('/opt/userdb/app/../bin/smsbackend.py');
		return $service;
	}


	public function createServiceSojka(): App\Model\Sojka
	{
		$service = new App\Model\Sojka('http://sojka.hkfree.org/pinger/');
		return $service;
	}


	public function createServiceSpravceOblasti(): App\Model\SpravceOblasti
	{
		$service = new App\Model\SpravceOblasti($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceStavBankovnihoUctu(): App\Model\StavBankovnihoUctu
	{
		$service = new App\Model\StavBankovnihoUctu($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceSubnet(): App\Model\Subnet
	{
		$service = new App\Model\Subnet($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTechnologiePripojeni(): App\Model\TechnologiePripojeni
	{
		$service = new App\Model\TechnologiePripojeni($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		$service = Tracy\Debugger::getBar();
		return $service;
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		$service = Tracy\Debugger::getBlueScreen();
		return $service;
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		$service = Tracy\Debugger::getLogger();
		return $service;
	}


	public function createServiceTypCestnehoClenstvi(): App\Model\TypCestnehoClenstvi
	{
		$service = new App\Model\TypCestnehoClenstvi($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTypClenstvi(): App\Model\TypClenstvi
	{
		$service = new App\Model\TypClenstvi($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTypPravniFormyUzivatele(): App\Model\TypPravniFormyUzivatele
	{
		$service = new App\Model\TypPravniFormyUzivatele($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTypSpravceOblasti(): App\Model\TypSpravceOblasti
	{
		$service = new App\Model\TypSpravceOblasti($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceTypZarizeni(): App\Model\TypZarizeni
	{
		$service = new App\Model\TypZarizeni($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceUzivatel(): App\Model\Uzivatel
	{
		$service = new App\Model\Uzivatel($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceUzivatelListGrid(): App\Model\UzivatelListGrid
	{
		$service = new App\Model\UzivatelListGrid(
			$this->getService('parameters'),
			$this->getService('ap'),
			$this->getService('cestneClenstviUzivatele'),
			$this->getService('uzivatel')
		);
		return $service;
	}


	public function createServiceUzivatelskeKonto(): App\Model\UzivatelskeKonto
	{
		$service = new App\Model\UzivatelskeKonto($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function createServiceWewimo(): App\Model\Wewimo
	{
		$service = new App\Model\Wewimo($this->getService('cryptoSluzba'), $this->getService('ipAdresa'), $this->getService('ap'));
		return $service;
	}


	public function createServiceZpusobPripojeni(): App\Model\ZpusobPripojeni
	{
		$service = new App\Model\ZpusobPripojeni($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		Tracy\Debugger::$editorMapping = [];
		Tracy\Debugger::getLogger($this->getService('tracy.logger'))->mailer = [new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer'), null), 'send'];
	}
}
