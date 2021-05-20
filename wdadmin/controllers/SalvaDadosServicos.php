<?php

require_once "../class/Arquivos.class.php";
require_once "../class/Servicos.class.php";

include 'MontaUrlAmigavel.php';

$Arquivos = new Arquivos();
$Servicos = new Servicos();

$Servicos->setId_servicos($_POST['inputIdServicos']);
$Servicos->setTitulo($_POST['inputTitulo']);
$Servicos->setTitulo_secao($_POST['inputTituloSecao']);
$Servicos->setResumo($_POST['inputResumo']);
$Servicos->setDescricao($_POST['inputDescricao']);
$Servicos->setIcone($_POST['inputIcone']);

$Arquivos->setArquivo_atual($_POST['inputImagemAtual']);
$Arquivos->setNovo_arquivo($_FILES['inputImagem']);
$Arquivos->setNome_amigavel(url_amigavel($_POST['inputTitulo']));
$Arquivos->setPasta("servicos");
$Arquivos->insere_arquivo();
$Servicos->setImagem($Arquivos->getRetorno_arquivo());
$Servicos->setUrl_amigavel(url_amigavel($_POST['inputTitulo']));
$Servicos->setPosicao($_POST['inputPosicao']);
$Servicos->setStatus($_POST['inputStatus']);
$Servicos->setLayout($_POST['inputLayout']);
$Servicos->setPlano_personalizado($_POST['inputPlanoPersonalizadoSecao']);

if ($Servicos->salva_dados()) {
    print $Servicos->getRetorno_dados();
} else {
    print 0;
}