<?php
function connectDb($dbname){
   try
   {
      $bdd = new PDO('mysql:host=localhost;dbname='.$dbname, 'root', 'xns3hs1a');
   }
   catch (Exception $e)
   {
      die('Error : ' . $e->getMessage());
   }
   return $bdd;
}
?>
