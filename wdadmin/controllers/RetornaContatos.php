<?php

require_once "../class/Contatos.class.php";

$Contatos = new Contatos();

if ($Contatos->consulta_dados()):
    print $Contatos->getRetorno_dados();
else:
    print 0;
endif;