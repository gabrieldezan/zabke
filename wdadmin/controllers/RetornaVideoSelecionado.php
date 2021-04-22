<?php

require_once "../class/Video.class.php";

$Video = new Video();
$Video->setId_video($_POST['viIdVideo']);

if ($Video->edita_dados()):
    print $Video->getRetorno_dados();
else:
    print 0;
endif;