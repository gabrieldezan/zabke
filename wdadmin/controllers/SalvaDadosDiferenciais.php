<?php

require_once "../class/Diferenciais.class.php";

$Diferenciais = new Diferenciais();

$Diferenciais->setId_diferenciais($_POST['inputIdDiferenciais']);
$Diferenciais->setId_servicos($_POST['hiddenIdServicos']);
$Diferenciais->setDescricao($_POST['inputDescricaoDiferenciais']);
$Diferenciais->setTexto($_POST['inputTextoDiferenciais']);
$Diferenciais->setIcone($_POST['inputIconeDiferenciais']);

if ($Diferenciais->salva_dados()) {
    print $Diferenciais->getRetorno_dados();
} else {
    print 0;
}