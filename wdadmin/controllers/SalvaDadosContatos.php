<?php

require_once "../class/Contatos.class.php";

$Contatos = new Contatos();

$Contatos->setId_contatos($_POST['inputIdContatos']);
$Contatos->setTitulo($_POST['inputTitulo']);
$Contatos->setIcone($_POST['inputIcone']);
$Contatos->setLink($_POST['inputLink']);
$Contatos->setTipo($_POST['inputTipo']);

if ($Contatos->salva_dados()) {
    print $Contatos->getRetorno_dados();
} else {
    print 0;
}