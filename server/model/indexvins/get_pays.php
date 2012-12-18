<?php

include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

function get_pays(){
   global $bdd;
   $query = $bdd-> prepare('SELECT * FROM  pays ORDER BY pays');
   $query->execute();
   $pays = $query->fetchAll();

   return $pays;

}

?>
