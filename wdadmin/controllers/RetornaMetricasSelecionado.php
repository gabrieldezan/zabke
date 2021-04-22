<?php

require_once "../class/Metricas.class.php";

$Metricas = new Metricas();
$Metricas->setId_metricas($_POST['viIdMetricas']);

if ($Metricas->edita_dados()):
    print $Metricas->getRetorno_dados();
else:
    print 0;
endif;