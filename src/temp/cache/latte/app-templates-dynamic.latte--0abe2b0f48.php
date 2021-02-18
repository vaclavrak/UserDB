<?php
// source: /opt/userdb/app/templates/dynamic.latte

use Latte\Runtime as LR;

class Template0abe2b0f48 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($component->components) as $inContainerComponent) {
			if ($inContainerComponent instanceof \Nette\Forms\Container) {
?>
        <tr>
            <td colspan="4">
<?php
				/* line 6 */
				$this->createTemplate($recordTemplate, ['recordContainer' => $inContainerComponent] + $this->params, "include")->renderToContentType('html');
?>
            </td>
        </tr>
<?php
			}
			else {
?>
        <tr>
            <td colspan="3">
                <?php
				$_input = is_object($inContainerComponent) ? $inContainerComponent : end($this->global->formsStack)[$inContainerComponent];
				echo $_input->getControl() /* line 13 */ ?>

            </td>
        </tr>
<?php
			}
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['inContainerComponent'])) trigger_error('Variable $inContainerComponent overwritten in foreach on line 1');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
