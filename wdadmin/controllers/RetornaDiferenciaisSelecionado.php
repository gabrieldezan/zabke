<?php

require_once "../class/Diferenciais.class.php";

$Diferenciais = new Diferenciais();
$Diferenciais->setId_diferenciais($_POST['viIdDiferenciais']);

if ($Diferenciais->edita_dados()):
    print $Diferenciais->getRetorno_dados();
else:
    print 0;
endif;