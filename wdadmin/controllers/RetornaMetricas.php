<?php

require_once "../class/Metricas.class.php";

$Metricas = new Metricas();
$Metricas->setId_servicos($_POST["viIdServicos"]);

if ($Metricas->consulta_dados()):
    print $Metricas->getRetorno_dados();
else:
    print 0;
endif;