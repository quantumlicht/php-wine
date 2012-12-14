<?php

try{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}


function get_tags(){
   global $bdd;
   $query = $bdd-> prepare('SELECT * FROM  tags ORDER BY tag');
   $query->execute();
   $tags = $query->fetchAll();

   return $tags;

}

?>
