<?php

session_start();

$_SESSION['id_conteudo_personalizado'] = $_POST['id'];
$_SESSION['titulo_conteudo_personalizado'] = $_POST['titulo'];
$_SESSION['largura_conteudo_personalizado'] = $_POST['largura'];
$_SESSION['altura_conteudo_personalizado'] = $_POST['altura'];

setcookie('TituloPagina', $_POST['titulo']);