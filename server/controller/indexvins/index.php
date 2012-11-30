<?php
session_start();
include_once('/opt/lampp/htdocs/server/controller/header.php');

$date = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
$pays = ['Australie','Canada','Chili','Etats-Unis','France','Italie','Portugal'];
$blanc = ['Reflets verts','Jaune pâle','Doré','Jaune paille','Ambre'];
$rouge = ['Pourpre','Grenat','Rubis','Cerise','Brique','Orangé'];
$arome_saveur = ['Animal','Boisé','Épicé','Floral','Fruité','Végétal'];
$acidite = ['Mou','Frais','Vif','Nerveux','Mordant','Excessif'];
$tanin = ['Fins','Soyeux','Râpeux','Rugueux','Astringents']; 
include_once('/opt/lampp/htdocs/server/view/indexvins/index.php');


?>
