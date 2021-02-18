<?php
// source: /opt/userdb/vendor/o5/grido/src/templates/default.latte

use Latte\Runtime as LR;

class Template4cd4f4b5cd extends Latte\Runtime\Template
{
	public $blocks = [
		'_grid' => 'blockGrid',
		'customization' => 'blockCustomization',
		'outerFilterWrapper' => 'blockOuterFilterWrapper',
		'outerFilter' => 'blockOuterFilter',
		'outerFilterControls' => 'blockOuterFilterControls',
		'table' => 'blockTable',
		'innerFilter' => 'blockInnerFilter',
		'innerFilterElement' => 'blockInnerFilterElement',
		'action' => 'blockAction',
		'search' => 'blockSearch',
		'operations' => 'blockOperations',
		'paginator' => 'blockPaginator',
		'right' => 'blockRight',
		'perpage' => 'blockPerpage',
		'perPageElement' => 'blockPerPageElement',
		'export' => 'blockExport',
		'reset' => 'blockReset',
		'actions' => 'blockActions',
	];

	public $blockTypes = [
		'_grid' => 'html',
		'customization' => 'html',
		'outerFilterWrapper' => 'html',
		'outerFilter' => 'html',
		'outerFilterControls' => 'html',
		'table' => 'html',
		'innerFilter' => 'html',
		'innerFilterElement' => 'html',
		'action' => 'html',
		'search' => 'html',
		'operations' => 'html',
		'paginator' => 'html',
		'right' => 'html',
		'perpage' => 'html',
		'perPageElement' => 'html',
		'export' => 'html',
		'reset' => 'html',
		'actions' => 'html',
	];


	function main()
	{
		extract($this->params);
		?><div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('grid')) ?>"><?php $this->renderBlock('_grid', $this->params) ?></div><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 29');
		if (isset($this->params['filter'])) trigger_error('Variable $filter overwritten in foreach on line 39');
		if (isset($this->params['column'])) trigger_error('Variable $column overwritten in foreach on line 64, 80, 171');
		if (isset($this->params['button'])) trigger_error('Variable $button overwritten in foreach on line 100');
		if (isset($this->params['step'])) trigger_error('Variable $step overwritten in foreach on line 124');
		if (isset($this->params['action'])) trigger_error('Variable $action overwritten in foreach on line 184');
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 158');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockGrid($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("grid", "static");
?>

<?php
		$form->getElementPrototype()->class[] = 'ajax grido';
		$form->getElementPrototype()->{"data-grido-refresh-handler"}
		= $control->link("refresh!", ['page' => NULL, 'perPage' => NULL, 'sort' => NULL, 'filter' => NULL]);

		$filterRenderType = $control->getFilterRenderType();

		$columnCount = count($columns) + ($control->hasOperation() ? 1 : 0);
		$showActionsColumn = $actions || $buttons;

		$actionThElement = \Nette\Utils\Html::el('th');
		$actionThElement->setText($control->translator->translate('Grido.Actions'));
		$actionThElement->class[] = 'actions center';
		;
?>

<?php
		$this->renderBlock('customization', get_defined_vars());
?>

<?php
		if ($form->getErrors()) {
			$iterations = 0;
			foreach ($form->getErrors() as $error) {
?><ul>
    <li><?php echo LR\Filters::escapeHtmlText($error) /* line 30 */ ?></li>
</ul>
<?php
				$iterations++;
			}
		}
?>

<?php
		/* line 34 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["form"], []);
?>

<?php
		if ($filterRenderType == \Grido\Components\Filters\Filter::RENDER_OUTER) {
			$this->renderBlock('outerFilterWrapper', get_defined_vars());
		}
?>

<?php
		$this->renderBlock('table', get_defined_vars());
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

<?php
		$this->global->snippetDriver->leave();
		
	}


	function blockCustomization($_args)
	{
		
	}


	function blockOuterFilterWrapper($_args)
	{
		extract($_args);
		$this->renderBlock('outerFilter', get_defined_vars());
		
	}


	function blockOuterFilter($_args)
	{
		extract($_args);
?>    <div class="filter outer">
        <div class="items">
<?php
		$iterations = 0;
		foreach ($formFilters as $filter) {
			?>            <span class="grid-filter-<?php echo LR\Filters::escapeHtmlAttr($filter->getName()) /* line 39 */ ?>">
                <?php echo LR\Filters::escapeHtmlText($filter->getLabel()) /* line 40 */ ?>

                <?php echo LR\Filters::escapeHtmlText($filter->getControl()) /* line 41 */ ?>

            </span>
<?php
			$iterations++;
		}
?>
        </div>
        <div class="buttons">
<?php
		$this->global->formsStack[] = $formContainer = $_form = end($this->global->formsStack)["buttons"];
		$this->renderBlock('outerFilterControls', get_defined_vars());
		array_pop($this->global->formsStack);
		$formContainer = $_form = end($this->global->formsStack) ?>
        </div>
    </div>
<?php
	}


	function blockOuterFilterControls($_args)
	{
		extract($_args);
		if ($formFilters) {
			?>                    <?php echo end($this->global->formsStack)["search"]->getControl()->addAttributes(['style' => "display:none"]) /* line 48 */ ?>

<?php
		}
		
	}


	function blockTable($_args)
	{
		extract($_args);
		echo $control->getTablePrototype()->startTag() /* line 58 */ ?>

    <thead>
        <tr class="head">
<?php
		if ($control->hasOperation()) {
			?>            <th class="checker"<?php
			if ($formFilters) {
				?> rowspan="<?php
				if ($filterRenderType == \Grido\Components\Filters\Filter::RENDER_OUTER) {
					?>1<?php
				}
				else {
					?>2<?php
				}
				?>"<?php
			}
?>>
                <input type="checkbox" title="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Grido.Invert')) ?>">
            </th>
<?php
		}
		$iterations = 0;
		foreach ($columns as $column) {
			?>                <?php echo $column->getHeaderPrototype()->startTag() /* line 65 */ ?>

<?php
			if ($column->isSortable()) {
				if (!$column->getSort()) {
					?>                        <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", [[$column->getName() => \Grido\Components\Columns\Column::ORDER_ASC]])) ?>"><?php
					echo $column->getLabel() /* line 67 */ ?></a>
<?php
				}
				if ($column->getSort() == \Grido\Components\Columns\Column::ORDER_ASC) {
					?>                        <a class="sort ajax asc" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", [[$column->getName() => \Grido\Components\Columns\Column::ORDER_DESC]])) ?>"><?php
					echo $column->getLabel() /* line 68 */ ?> <i class="arrow"></i></a>
<?php
				}
				if ($column->getSort() == \Grido\Components\Columns\Column::ORDER_DESC) {
					?>                        <a class="sort ajax desc" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", [[$column->getName() => \Grido\Components\Columns\Column::ORDER_ASC]])) ?>"><?php
					echo $column->getLabel() /* line 69 */ ?> <i class="arrow"></i></a>
<?php
				}
			}
			else {
				?>                        <span><?php echo $column->getLabel() /* line 71 */ ?></span>
<?php
			}
			?>                <?php echo $column->getHeaderPrototype()->endTag() /* line 73 */ ?>

<?php
			$iterations++;
		}
		if ($showActionsColumn) {
			?>                <?php echo LR\Filters::escapeHtmlText($actionThElement) /* line 76 */ ?>

<?php
		}
?>
        </tr>
<?php
		$this->renderBlock('innerFilter', get_defined_vars());
?>
    </thead>
    <tfoot>
        <tr>
            <td colspan="<?php echo LR\Filters::escapeHtmlAttr($showActionsColumn ? $columnCount + 1 : $columnCount) /* line 108 */ ?>">
<?php
		$this->renderBlock('search', get_defined_vars());
		$this->renderBlock('operations', get_defined_vars());
		$this->renderBlock('paginator', get_defined_vars());
?>
                <span class="right">
<?php
		$this->renderBlock('right', get_defined_vars());
?>                </span>
            </td>
        </tr>
    </tfoot>
    <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($data) as $row) {
			$checkbox = $control->hasOperation()
			? $form[\Grido\Components\Operation::ID][\Grido\Helpers::formatColumnName($control->getProperty($row, $control->getComponent(\Grido\Components\Operation::ID)->getPrimaryKey()))]
			: NULL;
			$tr = $control->getRowPrototype($row);
			$tr->class[] = $checkbox && $checkbox->getValue()
			? 'selected'
			: NULL;
			;
			?>            <?php echo $tr->startTag() /* line 167 */ ?>

<?php
			if ($checkbox) {
?>                <td class="checker">
                    <?php echo LR\Filters::escapeHtmlText($checkbox->getControl()) /* line 169 */ ?>

                </td>
<?php
			}
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($columns) as $column) {
				$td = $column->getCellPrototype($row);
				?>                    <?php echo $td->startTag() /* line 173 */ ?>

<?php
				if (is_string($column->getCustomRender()) && $column->getCustomRenderVariables()) {
					/* line 175 */
					$this->createTemplate($column->getCustomRender(), array_merge(['control' => $control, 'presenter' => $control->getPresenter(), 'item' => $row, 'column' => $column, ], $column->getCustomRenderVariables(), []) + $this->params, "include")->renderToContentType('html');
				}
				elseif (is_string($column->getCustomRender())) {
					/* line 177 */
					$this->createTemplate($column->getCustomRender(), ['control' => $control, 'presenter' => $control->getPresenter(), 'item' => $row, 'column' => $column] + $this->params, "include")->renderToContentType('html');
				}
				else {
					?>                            <?php echo $column->render($row) /* line 179 */ ?>

<?php
				}
				?>                    <?php echo $td->endTag() /* line 181 */ ?>

<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
			$this->renderBlock('actions', get_defined_vars());
			?>            <?php echo $tr->endTag() /* line 191 */ ?>

<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
		if (!$control->getCount()) {
			?>        <tr><td colspan="<?php echo LR\Filters::escapeHtmlAttr($showActionsColumn ? $columnCount + 1 : $columnCount) /* line 193 */ ?>" class="no-results"><?php
			echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.NoResults')) ?></td></tr>
<?php
		}
?>
    </tbody>
<?php echo $control->getTablePrototype()->endTag() /* line 195 */ ?>

<?php
	}


	function blockInnerFilter($_args)
	{
		extract($_args);
		if ($filterRenderType == \Grido\Components\Filters\Filter::RENDER_INNER && $formFilters) {
?>        <tr class="filter inner">
            <?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($columns) as $column) {
?>

<?php
				if ($column->hasFilter()) {
					$f = $control->getFilter($column->getName());
					?>                    <?php echo $f->getWrapperPrototype()->startTag() /* line 83 */ ?>

<?php
					$this->global->formsStack[] = $formContainer = $_form = end($this->global->formsStack)["filters"];
					$this->renderBlock('innerFilterElement', get_defined_vars());
					array_pop($this->global->formsStack);
					$formContainer = $_form = end($this->global->formsStack) ?>                    <?php echo $control->getFilter($column->getName())->getWrapperPrototype()->endTag() /* line 93 */ ?>

<?php
				}
				elseif ($column->headerPrototype->rowspan != 2) {
?>
                    <th>&nbsp;</th>
<?php
				}
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
?>

<?php
			if ($control->hasActions() || $control->hasButtons()) {
?>            <th class="actions">
<?php
				$this->renderBlock('action', get_defined_vars());
?>            </th>
<?php
			}
?>
        </tr>
<?php
		}
		
	}


	function blockInnerFilterElement($_args)
	{
		extract($_args);
		if ($f instanceof \Grido\Components\Filters\Check) {
			?>                            <?php
			$_input = is_object($column->getName()) ? $column->getName() : end($this->global->formsStack)[$column->getName()];
			echo $_input->getControlPart("") /* line 87 */ ?>

<?php
		}
		else {
			?>                            <?php
			$_input = is_object($column->getName()) ? $column->getName() : end($this->global->formsStack)[$column->getName()];
			echo $_input->getControl() /* line 89 */ ?>

<?php
		}
		
	}


	function blockAction($_args)
	{
		extract($_args);
		$iterations = 0;
		foreach ($buttons as $button) {
			/* line 101 */ if (is_object($button)) $_tmp = $button;
			else $_tmp = $this->global->uiControl->getComponent($button);
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
			$_tmp->render();
			$iterations++;
		}
		
	}


	function blockSearch($_args)
	{
		extract($_args);
?>                <span class="search">
                    <?php
		$_input = is_object($form['buttons']['search']) ? $form['buttons']['search'] : end($this->global->formsStack)[$form['buttons']['search']];
		echo $_input->getControl() /* line 110 */ ?>

                </span>
<?php
	}


	function blockOperations($_args)
	{
		extract($_args);
		if ($control->hasOperation()) {
			?>                <span class="operations"  title="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Grido.SelectSomeRow')) ?>">
                    <?php echo LR\Filters::escapeHtmlText($form[\Grido\Components\Operation::ID][\Grido\Components\Operation::ID]->control) /* line 113 */ ?>

<?php
			$form[\Grido\Grid::BUTTONS][\Grido\Components\Operation::ID]->controlPrototype->class[] = 'hide';
			?>                    <?php echo LR\Filters::escapeHtmlText($form[\Grido\Grid::BUTTONS][\Grido\Components\Operation::ID]->control) /* line 115 */ ?>

                </span>
<?php
		}
		
	}


	function blockPaginator($_args)
	{
		extract($_args);
		if ($paginator->steps && $paginator->pageCount > 1) {
?>                <span class="paginator">
                    <?php
			if ($control->page == 1) {
?>

                        <span class="disabled <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 119 */ ?>" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => $paginator->getPage() - 1])) ?>"><i class="<?php
				echo LR\Filters::escapeHtmlAttr($customization->getIconClass('arrow-left')) /* line 119 */ ?>"></i> <?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.Paginator.Previous')) ?></span>
<?php
			}
			else {
				?>                        <a class="ajax <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 121 */ ?>" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => $paginator->getPage() - 1])) ?>"><i class="<?php
				echo LR\Filters::escapeHtmlAttr($customization->getIconClass('arrow-left')) /* line 121 */ ?>"></i> <?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.Paginator.Previous')) ?></a>
<?php
			}
			$steps = $paginator->getSteps();
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($steps) as $step) {
				if ($step == $control->page) {
					?>                            <span class="disabled <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 126 */ ?>"><?php
					echo LR\Filters::escapeHtmlText($step) /* line 126 */ ?></span>
<?php
				}
				else {
					?>                            <a class="ajax <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 128 */ ?>" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => $step])) ?>"><?php
					echo LR\Filters::escapeHtmlText($step) /* line 128 */ ?></a>
<?php
				}
				if ($iterator->nextValue > $step + 1) {
					?>                        <a class="prompt" data-grido-prompt="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Grido.EnterPage')) ?>" data-grido-link="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => 0])) ?>">...</a>
<?php
				}
				$prevStep = $step;
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
			if ($control->page == $paginator->getPageCount()) {
				?>                        <span class="disabled <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 134 */ ?>" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => $paginator->getPage() + 1])) ?>"><?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.Paginator.Next')) ?> <i class="<?php
				echo LR\Filters::escapeHtmlAttr($customization->getIconClass('arrow-right')) /* line 134 */ ?>"></i></span>
<?php
			}
			else {
				?>                        <a class="ajax <?php echo LR\Filters::escapeHtmlAttr($customization->buttonClass) /* line 136 */ ?>" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("page!", ['page' => $paginator->getPage() + 1])) ?>"><?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.Paginator.Next')) ?> <i class="<?php
				echo LR\Filters::escapeHtmlAttr($customization->getIconClass('arrow-right')) /* line 136 */ ?>"></i></a>
<?php
			}
?>
                </span>
<?php
		}
		
	}


	function blockRight($_args)
	{
		extract($_args);
		$this->renderBlock('perpage', get_defined_vars());
		if ($control->hasExport()) {
?>                    <span class="export">
<?php
			$this->renderBlock('export', get_defined_vars());
?>                    </span>
<?php
		}
		$this->renderBlock('reset', get_defined_vars());
		
	}


	function blockPerpage($_args)
	{
		extract($_args);
?>                    <span class="count">
                        <label><?php echo LR\Filters::escapeHtmlText(sprintf($control->getTranslator()->translate('Grido.Items'), $paginator->getCountBegin(), $paginator->getCountEnd(), $control->getCount())) /* line 141 */ ?></label>
<?php
		$this->renderBlock('perPageElement', get_defined_vars());
		?>                        <?php
		$_input = is_object($form['buttons']['perPage']) ? $form['buttons']['perPage'] : end($this->global->formsStack)[$form['buttons']['perPage']];
		echo $_input->getControl()->addAttributes(['class' => 'hide']) /* line 145 */ ?>

                    </span>
<?php
	}


	function blockPerPageElement($_args)
	{
		extract($_args);
		?>                            <?php echo end($this->global->formsStack)["count"]->getControl() /* line 143 */ ?>

<?php
	}


	function blockExport($_args)
	{
		extract($_args);
		?>                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($control->getComponent(\Grido\Components\Export::ID)->link('export!'))) /* line 148 */ ?>" title="<?php
		echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->translate, 'Grido.ExportAllItems')) ?>"<?php
		if ($_tmp = array_filter([$customization->buttonClass])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
		echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, 'Grido.Export')) ?></a>
<?php
	}


	function blockReset($_args)
	{
		extract($_args);
?>                    <span class="reset">
                        <?php
		$_input = is_object($form['buttons']['reset']) ? $form['buttons']['reset'] : end($this->global->formsStack)[$form['buttons']['reset']];
		echo $_input->getControl() /* line 151 */ ?>

                    </span>
<?php
	}


	function blockActions($_args)
	{
		extract($_args);
		if ($showActionsColumn) {
?>                <td class="actions center">
                    <?php
			$iterations = 0;
			foreach ($actions as $action) {
?>

<?php
				/* line 185 */ if (is_object($action)) $_tmp = $action;
				else $_tmp = $this->global->uiControl->getComponent($action);
				if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
				$_tmp->render($row);
				$iterations++;
			}
			if (!$actions) {
?>
                        &nbsp;
<?php
			}
?>
                </td>
<?php
		}
		
	}

}
