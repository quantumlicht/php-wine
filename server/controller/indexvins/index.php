<?php
session_start();
include_once('/opt/lampp/htdocs/server/controller/header.php');

$date=['janvier','fevrier','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre'];
$pays=['Australie','Canada','Chili','Etats-Unis','France','Italie','Portugal'];
$blanc=['reflets verts','jaune pale','dore','jaune paille','ambre'];
$rouge=['pourpre','grenat','rubis','cerise','brique','orange'];
include_once('/opt/lampp/htdocs/server/view/indexvins/index.php');


?>
