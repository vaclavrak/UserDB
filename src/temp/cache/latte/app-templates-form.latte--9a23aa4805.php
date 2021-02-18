<?php
// source: /opt/userdb/app/templates/form.latte

use Latte\Runtime as LR;

class Template9a23aa4805 extends Latte\Runtime\Template
{
	public $blocks = [
		'errors' => 'blockErrors',
		'controls' => 'blockControls',
	];

	public $blockTypes = [
		'errors' => 'html',
		'controls' => 'html',
	];


	function main()
	{
		extract($this->params);
		$form = $_form = $this->global->formsStack[] = is_object($form) ? $form : $this->global->uiControl[$form];
		?><form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), false) ?>>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('errors', get_defined_vars());
?>

<?php
		$this->renderBlock('controls', get_defined_vars());
?>

<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?></form>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 4');
		if (isset($this->params['field'])) trigger_error('Variable $field overwritten in foreach on line 19');
		if (isset($this->params['component'])) trigger_error('Variable $component overwritten in foreach on line 8');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockErrors($_args)
	{
		extract($_args);
		if ($form->ownErrors) {
?>    <ul class="error">
<?php
			$iterations = 0;
			foreach ($form->ownErrors as $error) {
				?>        <li><?php echo LR\Filters::escapeHtmlText($error) /* line 4 */ ?></li>
<?php
				$iterations++;
			}
?>
    </ul>
<?php
		}
		
	}


	function blockControls($_args)
	{
		extract($_args);
?>    <table class="form">
        <?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($form->components) as $component) {
?>

<?php
			if ($component instanceof \Nette\Forms\Container) {
				if ($component->name =='ip') {
					/* line 12 */
					$this->createTemplate('dynamic.latte', ['recordTemplate' => 'ipform.latte', 'component' => $component] + $this->params, "include")->renderToContentType('html');
				}
				elseif ($component->name =='subnet') {
					/* line 14 */
					$this->createTemplate('dynamic.latte', ['recordTemplate' => 'subnetform.latte', 'component' => $component] + $this->params, "include")->renderToContentType('html');
				}
				elseif ($component->name =='apiKlic') {
					/* line 16 */
					$this->createTemplate('dynamic.latte', ['recordTemplate' => 'apiklicform.latte', 'component' => $component] + $this->params, "include")->renderToContentType('html');
				}
				else {
					$iterations = 0;
					foreach ($component->controls as $field) {
						?>                        <?php
						$_input = is_object($field) ? $field : end($this->global->formsStack)[$field];
						if ($_label = $_input->getLabel()) echo $_label;
						echo $field->required ? '<span class="red">*</span>' : NULL /* line 20 */ ?> <?php
						$_input = is_object($field) ? $field : end($this->global->formsStack)[$field];
						echo $_input->getControl() /* line 20 */ ?> <?php
						$_input = is_object($field) ? $field : end($this->global->formsStack)[$field];
						echo LR\Filters::escapeHtmlText($_input->getError());
?> <br>
<?php
						$iterations++;
					}
				}
			}
			else {
?>
                <tr>
                    <th><?php
				$_input = is_object($component) ? $component : end($this->global->formsStack)[$component];
				if ($_label = $_input->getLabel()) echo $_label;
				echo $component->required ? '<span class="red">*</span>' : NULL /* line 26 */ ?></th>
                    <td colspan="3"><?php
				$_input = is_object($component) ? $component : end($this->global->formsStack)[$component];
				echo $_input->getControl() /* line 27 */ ?> <?php
				$_input = is_object($component) ? $component : end($this->global->formsStack)[$component];
				echo LR\Filters::escapeHtmlText($_input->getError());
?></td>
                </tr>
<?php
			}
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
    </table>
<?php
	}

}
