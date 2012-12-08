<?php

try{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}


function get_encepagement($id){
   global $bdd;
   if ($id==1){
      $couleur ='rouge';
   }
   else if ($id == 2) {
      $couleur = 'blanc';
   } 
   $query = $bdd-> prepare('SELECT * FROM  encepagement_'.$couleur.' ORDER BY encepagement');
   $query->execute();
   $encepagement = $query->fetchAll();

   return $encepagement;

}

?>
