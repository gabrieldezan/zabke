<?php

require_once "../class/Video.class.php";

$Video = new Video();
$Video->setId_servicos($_POST["viIdServicos"]);

if ($Video->consulta_dados()):
    print $Video->getRetorno_dados();
else:
    print 0;
endif;