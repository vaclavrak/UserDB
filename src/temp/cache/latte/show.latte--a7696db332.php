<?php
// source: /opt/userdb/app/templates/Ap/show.latte

use Latte\Runtime as LR;

class Templatea7696db332 extends Latte\Runtime\Template
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
		if (isset($this->params['cs'])) trigger_error('Variable $cs overwritten in foreach on line 16');
		if (isset($this->params['apiKlic'])) trigger_error('Variable $apiKlic overwritten in foreach on line 43');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		if (isset($ap)) {
?>

<h3>oblast <?php echo LR\Filters::escapeHtmlText($ap->Oblast->jmeno) /* line 4 */ ?>, AP <?php echo LR\Filters::escapeHtmlText($ap->jmeno) /* line 4 */ ?> <?php
			if ($ap->gps) {
				?><small>GPS: <?php echo LR\Filters::escapeHtmlText($ap->gps) /* line 4 */ ?> <a href="http://mapa.hkfree.org/?lat=<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(call_user_func($this->filters->replace, $ap->gps, ',', '&lon='))) /* line 4 */ ?>">hkfree mapa</a> <a href="http://maps.google.com/maps?q=<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(call_user_func($this->filters->replace, $ap->gps, ',', '+'))) /* line 4 */ ?>">google mapa</a></small><?php
			}
?></h3>
<?php
			if ($canViewOrEdit) {
				?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:edit", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-pencil icon-pencil"></i> Editovat</a>
<?php
			}
			?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-user"></i> Zobrazit uživatele</a>
<br><br>
<pre>
<?php echo LR\Filters::escapeHtmlText($ap->poznamka) /* line 11 */ ?>

</pre>
<br>

<h4>Přehledy subnetů použitých na AP</h4>
<?php
			$iterations = 0;
			foreach ($csubnety as $cs) {
				?>    <p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Subnet:overview", ['id'=>$cs])) ?>" class="btn btn-default btn-sm" role="button"> Zobrazit subnety <?php
				echo LR\Filters::escapeHtmlText($cs) /* line 17 */ ?></a> <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Subnet:detail", ['id'=>$cs])) ?>" class="btn btn-default btn-sm" role="button"> Zobrazit ip <?php
				echo LR\Filters::escapeHtmlText($cs) /* line 17 */ ?></a></p>
<?php
				$iterations++;
			}
?>
<br>

<h4>IP Adresy <small>na AP</small></h4>
<?php echo LR\Filters::escapeHtmlText($adresy) /* line 22 */ ?>


<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 24 */ ?>/js/pinger.js"></script>
<script>
  $(document).ready(function() {
    pingIPList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>);
    //setInterval(function() {  pingIPList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>); }, 60*1000);
  }); 
</script> 

<h4>Subnety <small>na AP</small></h4>
<?php echo LR\Filters::escapeHtmlText($subnety) /* line 33 */ ?>


    <h4>API klíče <small>pro přístup k datům na AP přes REST API, postup viz <a href="https://github.com/HKFree/UserDB#accessing-api">GitHub</a></small></h4>
<table class="table table-striped">
    <tr>
        <th>Uživatelské jméno</th>
        <th>Klíč (heslo)</th>
        <th>Platnost do</th>
        <th>Poznámka</th>
    </tr>
<?php
			$iterations = 0;
			foreach ($apiKlice as $apiKlic) {
?>
    <tr>
        <td>apikey<?php echo LR\Filters::escapeHtmlText($apiKlic['id']) /* line 45 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($apiKlic['klic']) /* line 46 */ ?></td>
        <td><?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $apiKlic['plati_do'], '%d.%m.%Y')) /* line 47 */;
				if ($apiKlic['expired']) {
					?> <span class="text-danger glyphicon glyphicon-warning-sign" aria-hidden="true"></span><?php
				}
?></td>
        <td><?php echo LR\Filters::escapeHtmlText($apiKlic['poznamka']) /* line 48 */ ?></td>
    </tr>
<?php
				$iterations++;
			}
?>
</table>

<h4><a id="logsHeader">Změny (kliknutím rozbalíte)</a></h4>
<script>
  $(document).ready(function( $ ) {
      $("#logsHeader").click(function(){
          $(".logstable").toggle();
      });
      $(".logstable").hide();
  });

</script>
<?php
			/* line 63 */ $_tmp = $this->global->uiControl->getComponent("logTable");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
			$_tmp->render($ap->id, "ap");
?>

<?php
		}
		
	}

}
