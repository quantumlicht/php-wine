<?php

include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

function get_tags(){
   global  $bdd;
   $query = $bdd-> prepare('SELECT * FROM  tags WHERE NOT `status`=\'pending\' ORDER BY tag');
   $query->execute();
   $tags = $query->fetchAll();

   return $tags;

}

?>
