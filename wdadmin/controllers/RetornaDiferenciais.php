<?php

require_once "../class/Diferenciais.class.php";

$Diferenciais = new Diferenciais();
$Diferenciais->setId_servicos($_POST["viIdServicos"]);

if ($Diferenciais->consulta_dados()):
    print $Diferenciais->getRetorno_dados();
else:
    print 0;
endif;