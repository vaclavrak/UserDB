<?php
// source: /opt/userdb/app/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templateaa40a33d4e extends Latte\Runtime\Template
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
?>

<h1>Databáze členů z.s. HKFree.org</h1>

<script>
            $(document).ready(function( $ ) {
                $("#regHeader").click(function(){
                    $(".regimg").toggle();
                });
                $(".regimg").hide();
            });
            $(document).ready(function( $ ) {
                $("#netHeader").click(function(){
                    $(".netimg").toggle();
                });
                $(".netimg").hide();
            });
</script>

<h2><a id="regHeader">Jak funguje registrační proces ? (kliknutím rozbalíte)</a></h2>
<img class="regimg" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 21 */ ?>/images/diagram-reg.png">

<h2><a id="netHeader">Do kdy platí připojení k hlavnímu počítači zdarma ? (kliknutím rozbalíte)</a></h2>
<img class="netimg" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 24 */ ?>/images/diagram-free.png">

<?php
	}

}
