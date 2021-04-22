<?php

require_once "../class/ChamadaTeste.class.php";

$ChamadaTeste = new ChamadaTeste();
$ChamadaTeste->setId_chamada_teste($_POST['viIdChamadaTeste']);

if ($ChamadaTeste->edita_dados()):
    print $ChamadaTeste->getRetorno_dados();
else:
    print 0;
endif;