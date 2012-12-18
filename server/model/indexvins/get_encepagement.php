<?php

include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

function get_encepagement($id){
   global $bdd;
   if ($id==1){
      $couleur ='rouge';
   }
   else if ($id == 2) {
      $couleur = 'blanc';
   } 
   $query = $bdd-> prepare('SELECT `encepagementId`,`encepagement` FROM  `encepagements` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `encepagement`');
   $query->execute();
   $encepagement = $query->fetchAll();

   return $encepagement;

}

?>
