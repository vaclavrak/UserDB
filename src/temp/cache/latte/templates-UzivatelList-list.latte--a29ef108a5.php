<?php
// source: /opt/userdb/app/templates/UzivatelList/list.latte

use Latte\Runtime as LR;

class Templatea29ef108a5 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		if (isset($ap)) {
			?><h3>oblast <?php echo LR\Filters::escapeHtmlText($ap->Oblast->jmeno) /* line 2 */ ?>, AP <?php echo LR\Filters::escapeHtmlText($ap->jmeno) /* line 2 */ ?> <small>seznam uživatelů</small> </h3>
<?php
		}
		?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:list", ['id'=>$ap->Oblast->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-arrow-up"></i> Zobrazit oblast</a>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:show", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-eye-open"></i> Zobrazit podrobnosti AP</a>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Wewimo:show", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-signal"></i> Wewimo</a>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelMailSms:emailall", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><b>@</b> Odeslat E-mail všem z AP</a>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelMailSms:smsall", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-phone"></i> Odeslat SMS všem z AP</a>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:ids", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="fa fa-bug"></i> Události z IDS</a>

&nbsp;&nbsp;
<?php
		if ($canViewOrEdit) {
			if (!$money) {
				?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id, 'money'=>1])) ?>" class="btn btn-default btn-sm" role="button" title="Zobrazit informace z money"><i class="glyphicon glyphicon-unchecked"></i> Informace z money</a>
<?php
			}
		}
		if ($money) {
			?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id, 'money'=>0])) ?>" class="btn btn-default btn-sm active" role="button" title="Skrýt informace z money"><i class="glyphicon glyphicon-check"></i> Informace z money</a>
<?php
		}
?>

<?php
		if ($fullnotes) {
			?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm active" role="button" title="Zobrazit zkrácené poznámky a adresy"><i class="glyphicon glyphicon-check"></i> Kompletní poznámky a adresy</a>
<?php
		}
		if (!$fullnotes) {
			?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id, 'fullnotes'=>1])) ?>" class="btn btn-default btn-sm" role="button" title="Zobrazit kompletní poznámky a adresy"><i class="glyphicon glyphicon-unchecked"></i> Kompletní poznámky a adresy</a>
<?php
		}
?>

<br><br>

<?php
		/* line 21 */ $_tmp = $this->global->uiControl->getComponent("grid");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>

<ul>
    <li>Počet zrušených členů: <?php echo LR\Filters::escapeHtmlText($u_zrusenych) /* line 24 */ ?></li>
    <li>Počet primárních členů: <?php echo LR\Filters::escapeHtmlText($u_primarnich) /* line 25 */ ?></li>
    <li>Počet řádných členů: <?php echo LR\Filters::escapeHtmlText($u_radnych) /* line 26 */ ?></li>
    <li>Počet čestných členů: <?php echo LR\Filters::escapeHtmlText($u_cestnych) /* line 27 */ ?></li>
<?php
		if ($money) {
			?>    <li>Počet aktivních členů: <?php echo LR\Filters::escapeHtmlText($u_aktivnich) /* line 28 */ ?></li>
<?php
		}
		?>    <li>Počet všech členů: <?php echo LR\Filters::escapeHtmlText($u_celkem) /* line 29 */ ?></li>
    <li>Počet všech členů včetně zrušených: <?php echo LR\Filters::escapeHtmlText($u_celkemz) /* line 30 */ ?></li>
</ul>   

<br><br>
<h4>Uživatelé mimo AP:</h4>
<?php
		/* line 35 */ $_tmp = $this->global->uiControl->getComponent("othersGrid");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>

<br><br>
<p>Legenda:</p>
<table class="legend">
    <tr class="planovane"><td>Plánovaný člen</td></tr>
    <tr class="primarni"><td>Primární člen</td></tr>
    <tr class="cestne"><td>Čestný člen</td></tr>
    <tr class="zrusene"><td>Zrušený člen</td></tr>
    <tr style="background-color: #ff00ff !important;"><td>Vysoký přeplatek na účtu (vyřešte s uživatelem, nebo vyplňte mobilní kauci v detailu uživatele)</td></tr>
    <tr style="background-color: #ff0000 !important;"><td>Neaktivní člen (v závislosti na poslední platbě a poslední aktivaci zvažte zrušení členství)</td></tr>
</table>      
    
<br><br>
<style>
div.tooltip-inner {
  max-width: 400px;
}
</style>
<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 54 */ ?>/js/pinger.js"></script>
<script>
$(document).ready(function() {
  pingUserList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>);
  //setInterval(function() {  pingUserList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>); }, 60*1000);
}); 
</script>

<?php
	}

}
