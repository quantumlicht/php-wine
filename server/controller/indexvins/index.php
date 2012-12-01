<?php
session_start();

$date = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
$pays = ['Australie','Canada','Chili','Etats-Unis','France','Italie','Portugal'];
$blanc = array('0'=>'Reflets verts','1'=>'Jaune pâle','2'=>'Doré','3'=>'Jaune paille','4'=>'Ambre');
$rouge = array('0'=>'Pourpre','1'=>'Grenat','2'=>'Rubis','3'=>'Cerise','4'=>'Brique','5'=>'Orangé');
$arome_saveur = ['Animal','Boisé','Épicé','Floral','Fruité','Végétal'];
$acidite = ['Mou','Frais','Vif','Nerveux','Mordant','Excessif'];
$tanin = ['Fins','Soyeux','Râpeux','Rugueux','Astringents']; 


if (!isset($_REQUEST['ajax'])) {
  if(!isset($_REQUEST['id'])) $_REQUEST['id']=1;
  // ensure we select the top level select box is pre-selected
  $selected = array('1' => '', '2' => '');
  $selected[$_REQUEST['id']] = 'selected="selected"';

   include_once('/opt/lampp/htdocs/server/controller/header.php');
   include_once('/opt/lampp/htdocs/server/view/indexvins/index.php');
}
else{
  $couleurs= getCouleur($_REQUEST['id']);
  $json = '['; // start the json array element
  $json_couleur = array();
 foreach ($couleurs as $id => $couleur) {
     $json_couleur[] = "{'id': '$id', 'couleur': '$couleur'}";
   }
 
   $json .= implode(',', $json_couleur); // join the objects by commas;
   $json .= ']'; // end the json array element
   echo $json;
}
 
function getCouleur($id) {
 
   if ($id == 1) {
      $couleur = array('0'=>'Pourpre','1'=>'Grenat','2'=>'Rubis','3'=>'Cerise','4'=>'Brique','5'=>'Orangé');
   } else if ($id == 2) {
      $couleur = array('0'=>'Reflets verts','1'=>'Jaune pâle','2'=>'Doré','3'=>'Jaune paille','4'=>'Ambre');
   }
   return $couleur;
}

?>
