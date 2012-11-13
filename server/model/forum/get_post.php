<?php
function get_post(){
   global $bdd;
   $query = $bdd-> prepare('SELECT * FROM forum');
   $query->execute();
   $posts = $query->fetchAll();

   return $posts;
}


?>
