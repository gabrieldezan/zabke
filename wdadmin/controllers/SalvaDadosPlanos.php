<?php

require_once "../class/Planos.class.php";

$Planos = new Planos();

$Planos->setId_planos($_POST['inputIdPlanos']);
$Planos->setId_servicos($_POST['hiddenIdServicos']);
$Planos->setDescricao($_POST['inputDescricaoPlanos']);
$Planos->setDetalhes($_POST['inputDetalhesPlanos']);
$Planos->setValor($_POST['inputValorPlanos']);
$Planos->setIcone($_POST['inputIconePlanos']);

if ($Planos->salva_dados()) {
    print $Planos->getRetorno_dados();
} else {
    print 0;
}