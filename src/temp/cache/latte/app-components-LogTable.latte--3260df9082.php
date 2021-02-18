<?php
// source: /opt/userdb/app/components/LogTable.latte

use Latte\Runtime as LR;

class Template3260df9082 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		echo LR\Filters::escapeHtmlText($tabulka) /* line 1 */ ?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
