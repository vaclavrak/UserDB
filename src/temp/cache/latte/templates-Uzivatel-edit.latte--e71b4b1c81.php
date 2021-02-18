<?php
// source: /opt/userdb/app/templates/Uzivatel/edit.latte

use Latte\Runtime as LR;

class Templatee71b4b1c81 extends Latte\Runtime\Template
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

<?php
		if ($canViewOrEdit) {
			/* line 4 */
			$this->createTemplate('../form.latte', ['form' => 'uzivatelForm'] + $this->params, "include")->renderToContentType('html');
?>
<script>
    $( document ).ready(function() {
        $(".ip_adresa.ip").keyup(ipClickCallback);
        $(".ip_adresa.ip").click(ipClickCallback);

        $(".ip_adresa.ip").each(ipStartCallback);

        $('[data-toggle="tooltip"]').tooltip();
    });

    function ipClickCallback(e) {
        ipRefresh(e.target);
    }

    function ipStartCallback() {
        ipRefresh(this);
    }

    function ipRefresh(t) {
        var target = $(t);
        var ip = target.val();
        var tbody = t.parentNode.parentNode.parentNode;
        var detailsspan = $(tbody).find(".ip.details");

        var editsubnet = $(tbody).find(".ip.editsubnet");
        var apid = $("#frm-uzivatelForm-Ap_id").val();
        editsubnet.find("a").attr("href", <?php echo LR\Filters::escapeJs($this->global->uiControl->link("Ap:show", ['id' => null])) ?> + "/" + apid);
        editsubnet.show();

        if(!ipValidate(ip)) {
            var errorsspan = $(tbody).find(".ip.errors");
            errorsspan.show();
            detailsspan.hide();

            errorsspan.text("Neplatná IP adresa");
            return(false);
        }

        var reqid = detailsspan.data("reqid") + 1;
        detailsspan.data("reqid", reqid);

        $.ajax({
            type: "GET",
            url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("AjaxApi:GetIpDetails", ['id' => null])) ?>,
            data: { ip: ip, reqid: reqid, apid: apid },
            success: ipAjaxCallback.bind(tbody),
            dataType: "json"
        });
    }

    function ipAjaxCallback(d) {
        var detailsspan = $(this).find(".ip.details");
        var errorsspan = $(this).find(".ip.errors");

        if(detailsspan.data("reqid") != d.reqid){
            // data jdouci moc pozde zahodime
            return(false);
        }

        if(d.error) {
            errorsspan.text(d.error);

            errorsspan.show();
            detailsspan.hide();
        } else {
            detailsspan.find(".subnet").text(d.subnet);
            detailsspan.find(".gateway").text(d.gateway);
            detailsspan.find(".mask").text(d.mask);
            detailsspan.find(".subnetlink").attr('href', d.subnetLink);

            errorsspan.hide();
            detailsspan.show();
        }
    }

    function ipValidate(ip)
    {
        var rx = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
        return(rx.test(ip));
    }
</script>

<?php
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
