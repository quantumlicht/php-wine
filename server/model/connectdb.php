<?php

try
{
   $bdd = new PDO('mysql:host=localhost;dbname=user_db', 'root', 'xns3hs1a');
}
catch (Exception $e)
{
        die('Error : ' . $e->getMessage());
}

?>
