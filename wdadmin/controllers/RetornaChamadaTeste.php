<?php

require_once "../class/ChamadaTeste.class.php";

$ChamadaTeste = new ChamadaTeste();
$ChamadaTeste->setId_servicos($_POST["viIdServicos"]);

if ($ChamadaTeste->consulta_dados()):
    print $ChamadaTeste->getRetorno_dados();
else:
    print 0;
endif;