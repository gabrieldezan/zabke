<?php

require_once "../class/Contatos.class.php";

$Contatos = new Contatos();
$Contatos->setId_contatos($_POST['viIdContatos']);

if ($Contatos->edita_dados()):
    print $Contatos->getRetorno_dados();
else:
    print 0;
endif;