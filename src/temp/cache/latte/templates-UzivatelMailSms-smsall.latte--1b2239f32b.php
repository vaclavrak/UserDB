<?php
// source: /opt/userdb/app/templates/UzivatelMailSms/smsall.latte

use Latte\Runtime as LR;

class Template1b2239f32b extends Latte\Runtime\Template
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
?>

<h3>Odeslání sms <small>uživatelům AP <?php echo LR\Filters::escapeHtmlText($ap->jmeno) /* line 3 */ ?></small></h3>

<?php
		if ($canViewOrEdit) {
			/* line 6 */
			$this->createTemplate('../form.latte', ['form' => 'smsallForm'] + $this->params, "include")->renderToContentType('html');
		}
		else {
?>
<p>Na tuto operaci nemáte oprávnění!</p>
<?php
		}
?>

<?php
	}

}
