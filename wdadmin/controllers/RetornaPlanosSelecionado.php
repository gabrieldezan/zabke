<?php

require_once "../class/Planos.class.php";

$Planos = new Planos();
$Planos->setId_planos($_POST['viIdPlanos']);

if ($Planos->edita_dados()):
    print $Planos->getRetorno_dados();
else:
    print 0;
endif;