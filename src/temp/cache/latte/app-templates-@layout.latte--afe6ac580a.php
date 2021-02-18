<?php
// source: /opt/userdb/app/templates/@layout.latte

use Latte\Runtime as LR;

class Templateafe6ac580a extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striptags', $_fi, $s));
			});
			?> | <?php
		}
?>HKFree UserDB</title>

        <link href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 16 */ ?>/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/css/font-awesome.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */ ?>/js/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 20 */ ?>/css/jquery-ui.css">
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 21 */ ?>/js/jquery-ui.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 23 */ ?>/js/bootstrap.min.js"></script>
        <!-- Bar Rating ( https://github.com/antennaio/jquery-bar-rating ) -->
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 25 */ ?>/js/jquery.barrating.min.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 26 */ ?>/js/jquery.bonsai.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 27 */ ?>/js/markerclusterer.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 28 */ ?>/js/d3.min.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 29 */ ?>/js/d3.layout.min.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 30 */ ?>/js/rickshaw.min.js"></script>

        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 32 */ ?>/css/grido.css">
        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 33 */ ?>/css/screen.css?v16">
        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 34 */ ?>/css/jquery.bonsai.css">
        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 35 */ ?>/css/rickshaw.min.css">
        <link rel="stylesheet" media="print" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 36 */ ?>/css/print.css">
        <link rel="shortcut icon" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 37 */ ?>/favicon.ico">
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 38 */ ?>/js/main.js?v5"></script>
	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", ['id'=>null])) ?>"><span style="color:#FFFFFF">userdb.</span><span style="color:#666666">hkfree</span><span style="color:#cc0000">.org</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:show", ['id'=>$user->getIdentity()->getId()])) ?>"><?php
		echo LR\Filters::escapeHtmlText($user->getIdentity()->getNick()) /* line 56 */ ?> (<?php echo LR\Filters::escapeHtmlText($user->getIdentity()->getId()) /* line 56 */ ?>)</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sprava:mapa", ['id'=>null])) ?>">Mapa</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sprava:nastroje", ['id'=>null])) ?>">Nástroje</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sprava:logout", ['id'=>null])) ?>">Odhlášení</a></li>
          </ul>
          <?php
		/* line 61 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["searchForm"], []);
?>

                <?php echo LR\Filters::escapeHtmlText($form['search']->control) /* line 62 */ ?>

          <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:edit", ['id'=>null])) ?>">Přidat uživatele</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li><a id="navareas" href="#">Skrýt/zobrazit seznam oblastí</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
<?php
		if ($mojeOblasti) {
?>
            <h4>Moje oblasti</h4>
            <ul class="nav nav-sidebar">
<?php
			$iterations = 0;
			foreach ($mojeOblasti as $idoblast => $jmenoOblasti) {
				?>                <li id="oblast-<?php echo LR\Filters::escapeHtmlAttr($idoblast) /* line 81 */ ?>"><a href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$idoblast])) ?>"><?php
				echo LR\Filters::escapeHtmlText($jmenoOblasti) /* line 81 */ ?></a></li>
<?php
				$iterations++;
			}
?>
            </ul>
<?php
		}
		if ($oblasti) {
			?>            <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:listall", ['id'=>NULL])) ?>">Všechny oblasti</a></h4>
<?php
			if ($oblasti) {
?>            <ul class="nav nav-sidebar" id="oblastitree">
              <?php
				$iterations = 0;
				foreach ($oblasti as $idoblast => $o) {
?>

<?php
					$apcka = $o->related('Ap.Oblast_id')->order("jmeno");
					if (count($apcka) == 1) {
						$ap = $apcka->fetch();
						?>                  <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id])) ?>"><?php
						echo LR\Filters::escapeHtmlText($ap->jmeno) /* line 92 */ ?> (<?php echo LR\Filters::escapeHtmlText($o->id) /* line 92 */ ?>)</a></li>
<?php
					}
					else {
						?>                  <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:list", ['id'=>$o->id])) ?>"><?php
						echo LR\Filters::escapeHtmlText($o->jmeno) /* line 94 */ ?> (<?php echo LR\Filters::escapeHtmlText($o->id) /* line 94 */ ?>)</a>
                    <ul class="nav">
<?php
						$iterations = 0;
						foreach ($apcka as $idap => $theAp) {
							?>                      <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$theAp->id])) ?>"><?php
							echo LR\Filters::escapeHtmlText($theAp->jmeno) /* line 97 */ ?></a></li>
<?php
							$iterations++;
						}
?>
                    </ul>
                  </li>
<?php
					}
					$iterations++;
				}
?>
            </ul>
<?php
			}
		}
?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--          <h1 class="page-header">Dashboard</h1> -->
	  <script> document.documentElement.className+=' js' </script>

<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	  <div class="alert alert-<?php
			if (isset($flash->type)) {
				echo LR\Filters::escapeHtmlAttr($flash->type) /* line 110 */;
			}
			elseif (isset($flash->type)) {
				?>info<?php
			}
			?>"><?php echo LR\Filters::escapeHtmlText($flash->message) /* line 110 */ ?></div>
<?php
			$iterations++;
		}
?>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>
        </div>
      </div>
    </div>
<?php
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['idoblast'])) trigger_error('Variable $idoblast overwritten in foreach on line 80, 88');
		if (isset($this->params['jmenoOblasti'])) trigger_error('Variable $jmenoOblasti overwritten in foreach on line 80');
		if (isset($this->params['idap'])) trigger_error('Variable $idap overwritten in foreach on line 96');
		if (isset($this->params['theAp'])) trigger_error('Variable $theAp overwritten in foreach on line 96');
		if (isset($this->params['o'])) trigger_error('Variable $o overwritten in foreach on line 88');
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 110');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
		?>    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 117 */ ?>/js/netteForms.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 118 */ ?>/js/nette.ajax.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 119 */ ?>/js/grido.js"></script>
<?php
	}

}
