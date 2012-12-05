<?php
include_once('/opt/lampp/htdocs/server/model/indexvins/get_pays.php');
session_start();
$pays = get_pays();

$date = ['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'];
//$pays = ['Afrique du Sud','Allemagne','Australie','Canada','Chili','Etats-Unis','France','Grèce','Italie','Nouvelle-Zélande','Portugal'];
$blanc = array('0'=>'Reflets verts','1'=>'Jaune pâle','2'=>'Doré','3'=>'Jaune paille','4'=>'Ambré');
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
     $json_couleur[] = "{\"id\": $id, \"couleur\": \"$couleur\"}";
  }
 
  $json .= implode(',', $json_couleur); // join the objects by commas;
  $json .= ']'; // end the json array element
  echo $json;
}
 
function getCouleur($id) {
   global $rouge;
   global $blanc; 
   if ($id == 1) {
      $couleur = $rouge; 
   } else if ($id == 2) {
      $couleur = $blanc;
   }
   return $couleur;
}

?>
