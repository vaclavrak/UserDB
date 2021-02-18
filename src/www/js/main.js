$(function () {
    $('#frm-uzivatelForm-index_potizisty').barrating({ showSelectedRating:false });
});

$(document).ready(function() {
    $(".datepicker").change(function() {
        if($(this).val().indexOf("00:00:00") > -1) $(this).val($(this).val().replace(" 00:00:00", ""));
    });
    $(".datepicker").change();
    $(".datepicker").off("change");

    $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });

    $("#navareas").click(function(){
        $(".sidebar").toggle();
        if($(".sidebar").is(":visible")) $(".main").css( { marginLeft : "210px" } );
        else $(".main").css( { marginLeft : "0px" } );
        $(".navbar-toggle").click();
    });
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        // na mobilu
        if (!window.location.href.endsWith('/userdb/') && !window.location.href.endsWith('/userdb')) {
            // a neni to uvodni "landing page", tak skryt levou navigacni listu s oblastmi
            $(".sidebar").hide();
            $(".main").css( { marginLeft : "0px" } );
        }
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('[data-toggle="popover"]').popover();
});

// EXTREMNI prasarna pro "nastaveni" defaultniho inputu ve formulari
$(document).ready(function() {
    $('form').each(function () {
        var thisform = $(this);
        var clonebutton = thisform.find('input.default');
        var newID = clonebutton.attr('id') + "x";
        thisform.prepend(clonebutton.clone().css({
            position: 'absolute',
            left: '-2000px',
            top: '-2000px',
            height: 0,
            width: 0
        }).attr('id', newID));
    });
});

// INICIALIZATOR pro JSTREE
$(document).ready(function() {
    $('#oblastitree').bonsai();
});

// Scroll na objekt odkazovany ve fragmentu (napr. "#ip10.107.12.1")
// a zvyrazneni objektu (id musi byt napr. 'highlightable-ip10.107.12.1')
$(document).ready(function() {
    var elem = document.getElementById('highlightable-' + window.location.hash.replace('#', ''));
    if (elem) {
        console.log(elem);
        // nastavit vyrazne zvyrazneni
        $(elem).addClass('highlighted');
        // po chvili nastavit (v CSS animovane) slabsi zvyrazneni
        setTimeout(function() {
            $(elem).addClass('highlighted-fadeout');
        }, 1000);
        // scrollovat k elementu (musime odscrollovat trochu min, protoze nahore je fixni navbar-header)
        // scrollovat tak, aby element byl v prvni tretine obrazovky
        $('html, body').animate({
            scrollTop: $(elem).offset().top - $('.navbar-header').height() - ($(window).height()-$('.navbar-header').height())/3
        }, 1000);
    }
});

$(document).ready(function () {
    $(document).on('click', '.wboxbutton', function (event) {
        event.preventDefault();
        var txt = $(this).attr('tag');
        var urlHref = $(this).attr('href');
        if(!txt || txt == ''){
            return;
        }
    
        copyTextToClipboard(txt);

        if(!urlHref || urlHref == ''){
            return;
        }
        var win = window.open(urlHref, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    });
});  

function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
  
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    textArea.style.padding = 0;
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
    textArea.style.background = 'transparent';
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }
    document.body.removeChild(textArea);
}

function openMikrotikWebfig(ip, username, password) {
    var theHTML = "<!doctype html><html>" +
        "<head><script>window.name='login="+username+"|"+password+"';window.location.replace('http://"+ip+"/webfig/#Wireless');</script></head><body></body></html>";
    var webfigWindow = window.open("","");
    webfigWindow.document.write(theHTML);
    return false;
}
