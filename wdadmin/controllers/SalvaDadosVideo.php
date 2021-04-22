<?php

require_once "../class/Arquivos.class.php";
require_once "../class/Video.class.php";

include 'MontaUrlAmigavel.php';

$Arquivos = new Arquivos();
$Video = new Video();

$Video->setId_video($_POST['inputIdVideo']);
$Video->setId_servicos($_POST['hiddenIdServicos']);
$Video->setTitulo($_POST['inputTituloVideo']);
$Video->setDetalhes($_POST['inputDetalhesVideo']);
$Video->setLink($_POST['inputLinkVideo']);

$Arquivos->setArquivo_atual($_POST['inputImagemVideoAtual']);
$Arquivos->setNovo_arquivo($_FILES['inputImagemVideo']);
$Arquivos->setNome_amigavel(url_amigavel($_POST['inputTituloVideo']));
$Arquivos->setPasta("video");
$Arquivos->insere_arquivo();
$Video->setImagem($Arquivos->getRetorno_arquivo());

if ($Video->salva_dados()) {
    print $Video->getRetorno_dados();
} else {
    print 0;
}