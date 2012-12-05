<?php

try{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}


function get_pays(){
   global $bdd;
   $query = $bdd-> prepare('SELECT * FROM  pays ORDER BY pays');
   $query->execute();
   $pays = $query->fetchAll();

   return $pays;

}

?>
