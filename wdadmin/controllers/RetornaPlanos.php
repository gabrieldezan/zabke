<?php

require_once "../class/Planos.class.php";

$Planos = new Planos();
$Planos->setId_servicos($_POST["viIdServicos"]);

if ($Planos->consulta_dados()):
    print $Planos->getRetorno_dados();
else:
    print 0;
endif;