<?php
// source: /opt/userdb/app/templates/Uzivatel/show.latte

use Latte\Runtime as LR;

class Template633833a1c3 extends Latte\Runtime\Template
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
		if (isset($this->params['slave'])) trigger_error('Variable $slave overwritten in foreach on line 45');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		if (isset($u)) {
?>

    <h3><?php
			if ($canViewOrEdit) {
				echo LR\Filters::escapeHtmlText($u->jmeno) /* line 4 */ ?> <?php echo LR\Filters::escapeHtmlText($u->prijmeni) /* line 4 */ ?> <?php
			}
			?>(<?php echo LR\Filters::escapeHtmlText($u->nick) /* line 4 */ ?>) <small> - <?php echo LR\Filters::escapeHtmlText($u->Ap->Oblast->jmeno) /* line 4 */ ?> <?php
			echo LR\Filters::escapeHtmlText($u->Ap->jmeno) /* line 4 */ ?></small></h3>
<?php
			if ($canViewOrEdit) {
				?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:edit", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-pencil icon-pencil"></i> Editovat</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelRightsCc:editrights", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-cog"></i> Editovat oprávnění</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelRightsCc:editcc", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-asterisk"></i> Editovat čestné členství</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelMailSms:email", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><b>@</b> Odeslat E-mail</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelMailSms:sms", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-phone"></i> Odeslat SMS</a>
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:exportPdf", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-file"></i> Registrační formulář</a>
<?php
				if ($u->regform_downloaded_password_sent==0) {
					?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:sendRegActivation", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button">Odeslat znovu aktivační link e-mailem</a>
<?php
				}
				else {
					?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:exportAndSendRegForm", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button">Odeslat registrační formulář e-mailem</a>
<?php
				}
?>
    <a href="https://aweg3.maternacz.com/profil/index.php" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-arrow-right"></i> SMS Materna</a>
<?php
			}
			?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelList:list", ['id'=>$u->Ap->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-arrow-up"></i> Zpět do AP</a>
    <div style="margin-top:3px;">
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelAccount:account", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-usd"></i> Přehled plateb</a>
    <?php
			if ($activaceVisible) {
				?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:moneyActivate", ['id'=>$u->id])) ?>" class="btn btn-success btn-sm" role="button"><i class="glyphicon glyphicon-ok-circle"></i> Aktivace</a><?php
			}
?>

    <?php
			if ($reactivaceVisible) {
				?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:moneyReactivate", ['id'=>$u->id])) ?>" class="btn btn-success btn-sm" role="button"><i class="glyphicon glyphicon-ok-circle"></i> Reaktivace</a><?php
			}
?>

    <?php
			if ($deactivaceVisible) {
				?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UzivatelActions:moneyDeactivate", ['id'=>$u->id])) ?>" class="btn btn-danger btn-sm" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Deaktivace</a><?php
			}
?>

<?php
			if ($igw) {
				?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:show", ['id'=>$u->id])) ?>" class="btn btn-default btn-sm active" role="button" title="Zobrazit stav na IGW"><i class="glyphicon glyphicon-check"></i> Zobrazit stav na IGW</a>
<?php
			}
			if (!$igw) {
				?>    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:show", ['id'=>$u->id, 'igw'=>1])) ?>" class="btn btn-default btn-sm" role="button" title="Zobrazit stav na IGW"><i class="glyphicon glyphicon-unchecked"></i> Zobrazit stav na IGW</a>
<?php
			}
?>

    </div>

    <br><br>
    <style>
	.table-nonfluid {
	    width: auto;
	 }
    </style>

    <table class="table table-nonfluid">

<?php
			if ($master) {
				?>        <tr class="error"><th>Sloučen pod uživatele </th><td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:show", ['id'=>$master->id])) ?>"><?php
				echo LR\Filters::escapeHtmlText($master->nick) /* line 40 */ ?></a></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
<?php
			}
?>

<?php
			if ($slaves) {
				$iterations = 0;
				foreach ($slaves as $slave) {
					?>        <tr class="error"><th>Sloučený uživatel </th><td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Uzivatel:show", ['id'=>$slave])) ?>"><?php
					echo LR\Filters::escapeHtmlText($slave) /* line 45 */ ?></a></td></tr>
<?php
					$iterations++;
				}
?>
        <tr><td colspan="2">&nbsp;</td></tr>
<?php
			}
?>

	<tr><th>ID</th><td><?php echo LR\Filters::escapeHtmlText($u->id) /* line 49 */ ?></td></tr>
	<tr><th>Oblast - AP</th><td><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:list", ['id' => $u->Ap->Oblast->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($u->Ap->Oblast->jmeno) /* line 50 */ ?></a> - <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Ap:show", ['id' => $u->Ap->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($u->Ap->jmeno) /* line 50 */ ?></a></td></tr>
    <tr><th>Typ členství</th><td><?php
			if ($hasCC) {
				?>platné čestné členství<?php
			}
			else {
				echo LR\Filters::escapeHtmlText($u->TypClenstvi->text) /* line 51 */;
			}
?></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>


    <tr><th>Přezdívka</th><td><?php echo LR\Filters::escapeHtmlText($u->nick) /* line 55 */ ?></td></tr>
<?php
			if ($canViewOrEdit) {
				?>        <tr><th>Typ právní formy</th><td><?php echo LR\Filters::escapeHtmlText($u->TypPravniFormyUzivatele->text) /* line 57 */ ?></td></tr>
<?php
				if ($u->TypPravniFormyUzivatele->text == 'PO') {
					?>        <tr><th>Název firmy</th><td><?php echo LR\Filters::escapeHtmlText($u->firma_nazev) /* line 58 */ ?></td></tr>
<?php
				}
				if (isset($u->firma_ico) || ($u->TypPravniFormyUzivatele->text == 'PO')) {
					?>        <tr><th>IČO</th><td><?php echo LR\Filters::escapeHtmlText($u->firma_ico) /* line 59 */ ?></td></tr>
<?php
				}
				?>        <tr><th>Číslo členské karty</th><td><?php echo LR\Filters::escapeHtmlText($u->cislo_clenske_karty) /* line 60 */ ?></td></tr>
        <tr><th>Jméno a příjmení</th><td><?php echo LR\Filters::escapeHtmlText($u->jmeno) /* line 61 */ ?> <?php
				echo LR\Filters::escapeHtmlText($u->prijmeni) /* line 61 */ ?></td></tr>

        <tr><th>Ulice a č.p.</th><td><?php echo LR\Filters::escapeHtmlText($u->ulice_cp) /* line 63 */ ?> <?php
				if ($u->location_status != 'pending' && $u->location_status != 'unknown') {
					?><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sprava:mapa", ['id'=>null])) ?>#uid<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($u->id)) /* line 63 */ ?>" class="spacing-left"><i class="fa fa-map-marker" aria-hidden="true"></i> mapa</a><?php
				}
?></td></tr>
        <tr><th>Obec</th><td><?php echo LR\Filters::escapeHtmlText($u->mesto) /* line 64 */ ?></td></tr>
        <tr><th>PSČ</th><td><?php echo LR\Filters::escapeHtmlText($u->psc) /* line 65 */ ?></td></tr>
        <tr><th>Email</th><td><?php echo LR\Filters::escapeHtmlText($u->email) /* line 66 */ ?></td></tr>
        <tr><th>Sekundární email</th><td><?php echo LR\Filters::escapeHtmlText($u->email2) /* line 67 */ ?></td></tr>
        <tr><th>Telefon</th><td><?php echo LR\Filters::escapeHtmlText($u->telefon) /* line 68 */ ?></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>

        <tr><th>Index spokojenosti člena</th><td><div class="br-widget-show"><span class="lebka-zluta"></span><?php
				for ($i=1;
				$i<6;
				$i++) {
					if ($i<=$u->index_potizisty) {
						?><span class="lebka-cervena"></span><?php
					}
					else {
						?><span class="lebka-seda"></span><?php
					}
				}
?></div></td></tr>
        <tr><th>Technologie připojení</th><td><?php echo LR\Filters::escapeHtmlText($u->TechnologiePripojeni->text) /* line 72 */ ?></td></tr>
        <tr><th>Způsob připojení</th><td><?php echo LR\Filters::escapeHtmlText($u->ZpusobPripojeni->text) /* line 73 */ ?></td></tr>
        <tr><th>Poznámka</th><td><pre class="well well-sm"><?php echo LR\Filters::escapeHtmlText($u->poznamka) /* line 74 */ ?></pre></td></tr>
        <tr><th>GPG klíč</th><td><pre class="well well-sm"><?php echo LR\Filters::escapeHtmlText($u->gpg) /* line 75 */ ?></pre></td></tr>
        <tr><th>Založen</th><td><?php echo LR\Filters::escapeHtmlText($u->zalozen) /* line 76 */ ?></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>

        <tr><th>Kauce na mobilní tarify</th><td><?php echo LR\Filters::escapeHtmlText($u->kauce_mobil) /* line 79 */ ?></td></tr>
        <tr><th>Aktivní</th><td><?php echo LR\Filters::escapeHtmlText($money_act) /* line 80 */ ?></td></tr>
        <tr><th>Deaktivace</th><td><?php echo LR\Filters::escapeHtmlText($money_dis) /* line 81 */ ?></td></tr>
        <tr><th>Poslední platba</th><td><?php echo LR\Filters::escapeHtmlText($money_lastpay) /* line 82 */ ?></td></tr>
        <tr><th>Poslední aktivace</th><td><?php echo LR\Filters::escapeHtmlText($money_lastact) /* line 83 */ ?></td></tr>
        <tr><th>Stav účtu</th><td><?php echo LR\Filters::escapeHtmlText($money_bal) /* line 84 */ ?></td></tr>
        <tr><th>Souhrn členských příspěvků od 1.11.2017</th><td><?php echo LR\Filters::escapeHtmlText($money_dph) /* line 85 */ ?></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>



<?php
			}
?>
    </table>

        <h4>IP Adresy</h4>
<?php
			if ($canViewOrEdit) {
				?>            <?php echo LR\Filters::escapeHtmlText($adresy) /* line 95 */ ?>

<?php
			}
			else {
				?>            <p><?php echo LR\Filters::escapeHtmlText($adresyline) /* line 97 */ ?></p>
<?php
			}
?>

        <h4>Události z IDS <small>za posledních 7 dní, max. 1000 záznamů</small></h4>
        <div id="ids">
            Načítám...
        </div>

<?php
			if ($canViewOrEdit) {
?>
        <script>
            $(document).ready(function( $ ) {
                $("#logsHeader").click(function(){
                    $(".logstable").toggle();
                });
                $(".logstable").hide();
            });

        </script>
        <h4><a id="logsHeader">Změny (kliknutím rozbalíte)</a></h4>

<?php
				/* line 117 */ $_tmp = $this->global->uiControl->getComponent("logTable");
				if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
				$_tmp->render($u->id);
?>

<?php
			}
?>

    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 121 */ ?>/js/pinger.js"></script>
    <script>
      $(document).ready(function() {
        pingIPList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>);
        //setInterval(function() {  pingIPList(<?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpsPing", ['id' => null])) ?>); }, 60*1000);
      }); 
    </script>  
    
<?php
		}
?>

<script>
$(function(){
    if ($('#ids')) {
        $.ajax({
            url : <?php echo LR\Filters::escapeJs($this->global->uiControl->link("ids")) ?>,
            type: 'GET',
            success: function(data){
                $('#ids').html(data);
            }
        });
    }
});

</script>
<?php
	}

}
