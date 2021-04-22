<script src="<?php echo URL . "js/jquery.min.js" ?>"></script>
<script src="<?php echo URL . "js/jquery.magnific-popup.min.js" ?>"></script>
<script src="<?php echo URL . "js/jquery.isotope.min.js" ?>"></script>
<script src="<?php echo URL . "js/owl.carousel.min.js" ?>"></script>
<script src="<?php echo URL . "js/easypiechart.min.js" ?>"></script>
<script src="<?php echo URL . "js/jquery.countdown.min.js" ?>"></script>
<script src="<?php echo URL . "js/scripts.js" ?>"></script>
<script src="<?php echo URL . "js/header-mobile.js" ?>"></script>
<script src="<?php echo URL . "plugins/revolution/revolution/js/jquery.themepunch.tools.min.js" ?>"></script>
<script src="<?php echo URL . "plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js" ?>"></script>
<script src="<?php echo URL . "plugins/revolution/revolution/js/extensions/revolution-plugin.js" ?>"></script>
<script src="<?php echo URL . "js/rev-script-3.js" ?>"></script>
<script src="<?php echo URL . "js/royal_preloader.min.js" ?>"></script>
<script type="text/javascript">
    vsUrl = $("#vsUrl").val();
    jQuery('#campo_buscar').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Buscar();
            return false;
        }
    });
    function Buscar() {
        var url = vsUrl + "busca/" + $("#campo_buscar").val();
        window.location.href = url;
        //    alert(vsUrl);
    }
    $("#botao_buscar").click(function () {
        Buscar();
    });
</script>
<script>
    window.jQuery = window.$ = jQuery;
    (function ($) {
        "use strict";
        //Preloader
        Royal_Preloader.config({
            mode: 'logo',
            logo: '<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>',
            logo_size: [145, 45],
            showProgress: true,
            showPercentage: true,
            text_colour: '#000000',
            background: '#ffffff'
        });
    })(jQuery);
</script>