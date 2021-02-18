<?php
// source: /opt/userdb/app/templates/Uzivatel/ids.latte

use Latte\Runtime as LR;

class Templatef3430d66ed extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		if (count($idsEvents) > 0) {
?>
    <table class="table table-striped">
    <thead>
        <th>Čas</th>
        <th>Zdrojová IPv4</th>
        <th>Cílová IPv4</th>
        <th>Severity</th>
        <th>Signature</th>
        <th>Category</th>
    </thead>
    <tbody>
<?php
			$iterations = 0;
			foreach ($idsEvents as $event) {
?>    <tr>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['timestamp']) /* line 13 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['src_ip4']) /* line 14 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['dest_ip4']) /* line 15 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['alert']['severity']) /* line 16 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['alert']['signature']) /* line 17 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($event['_source']['alert']['category']) /* line 18 */ ?></td>
    </tr>
<?php
				$iterations++;
			}
?>
    </tbody>
    </table>
<?php
		}
		else {
?>
    <p class="text-muted">(žádné události)</p>
<?php
		}
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['event'])) trigger_error('Variable $event overwritten in foreach on line 12');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
