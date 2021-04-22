<?php

require_once "../class/Arquivos.class.php";
require_once "../class/ChamadaTeste.class.php";

include 'MontaUrlAmigavel.php';

$Arquivos = new Arquivos();
$ChamadaTeste = new ChamadaTeste();

$ChamadaTeste->setId_chamada_teste($_POST['inputIdChamadaTeste']);
$ChamadaTeste->setId_servicos($_POST['hiddenIdServicos']);
$ChamadaTeste->setTitulo($_POST['inputTituloChamadaTeste']);
$ChamadaTeste->setTexto($_POST['inputTextoChamadaTeste']);
$ChamadaTeste->setTexto_botao($_POST['inputTextoBotaoChamadaTeste']);
$ChamadaTeste->setLink($_POST['inputLinkChamadaTeste']);

$Arquivos->setArquivo_atual($_POST['inputImagemChamadaTesteAtual']);
$Arquivos->setNovo_arquivo($_FILES['inputImagemChamadaTeste']);
$Arquivos->setNome_amigavel(url_amigavel($_POST['inputTituloChamadaTeste']));
$Arquivos->setPasta("chamada_teste");
$Arquivos->insere_arquivo();
$ChamadaTeste->setImagem($Arquivos->getRetorno_arquivo());

if ($ChamadaTeste->salva_dados()) {
    print $ChamadaTeste->getRetorno_dados();
} else {
    print 0;
}