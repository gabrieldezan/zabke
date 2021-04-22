<?php

require_once "../class/Arquivos.class.php";
require_once "../class/Metricas.class.php";

include 'MontaUrlAmigavel.php';

$Arquivos = new Arquivos();
$Metricas = new Metricas();

$Metricas->setId_metricas($_POST['inputIdMetricas']);
$Metricas->setId_servicos($_POST['hiddenIdServicos']);
$Metricas->setDescricao($_POST['inputDescricaoMetricas']);
$Metricas->setValor($_POST['inputValorMetricas']);

$Arquivos->setArquivo_atual($_POST['inputImagemMetricasAtual']);
$Arquivos->setNovo_arquivo($_FILES['inputImagemMetricas']);
$Arquivos->setNome_amigavel(url_amigavel($_POST['inputDescricaoMetricas']));
$Arquivos->setPasta("metricas");
$Arquivos->insere_arquivo();
$Metricas->setImagem($Arquivos->getRetorno_arquivo());

if ($Metricas->salva_dados()) {
    print $Metricas->getRetorno_dados();
} else {
    print 0;
}