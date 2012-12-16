<?php
include_once('/opt/lampp/htdocs/server/model/indexvins/get_pays.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_encepagement.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_tags.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_couleur.php');
session_start();

$pays = get_pays();
$date = ['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'];

$arome_saveur = ['Animal','Boisé','Épicé','Floral','Fruité','Végétal'];
$acidite = ['Mou','Frais','Vif','Nerveux','Mordant','Excessif'];
$tanin = ['Fins','Soyeux','Râpeux','Rugueux','Astringents']; 


if (!isset($_REQUEST['ajax'])) {
  if(!isset($_REQUEST['id'])) $_REQUEST['id']=1;
  
   include_once('/opt/lampp/htdocs/server/controller/header.php');
   include_once('/opt/lampp/htdocs/server/view/indexvins/index.php');
}
else{
  if(!isset($_REQUEST['flag'])){
     $couleurs = get_couleur($_REQUEST['id']);
     $encepagements = get_encepagement($_REQUEST['id']);
 
     $json = "{\"couleur\":["; // start the json array element
     $json_couleur = array();
     foreach ($couleurs as $couleur) {
        $json_couleur[] = "{\"id\":". $couleur['teinteId'].", \"couleur\": \"". $couleur['teinte']."\"}";
     }
 
     $json .= implode(',', $json_couleur); // join the objects by commas;

     $json .= '],"encepagement":['; // end the json array element

     $json_encepagement = array();

     foreach($encepagements as $encepagement){
        $json_encepagement[] = "{\"id\":". $encepagement['encepagementId'].", \"encepagement\": \"". $encepagement['encepagement']."\"}";
      }
      $json .= implode(',',$json_encepagement);
      $json .= ']}';
      echo $json;
   }
   else if(isset($_REQUEST['flag']) & $_REQUEST['flag']=='typeahead-tags'){
      $tags = get_tags();
      $json = '[';
      $json_tags = array();
     
      foreach($tags as $tag){
         $json_tags[]="\"".$tag['tag']."\"";
      }
      $json.= implode(',',$json_tags);
      $json.= ']';
      echo $json; 
   }
   else if(isset($_REQUEST['flag']) & $_REQUEST['flag']=='typeahead-encepagement'){
      $encepagements = get_encepagement($_REQUEST['id']);
      $json = '[';
      $json_encepagements = array();
     
      foreach($encepagements as $encepagement){
         $json_encepagements[]="\"".$encepagement['encepagement']."\"";
      }
      $json.= implode(',',$json_encepagements);
      $json.= ']';
      echo $json; 
   }

}

?>
