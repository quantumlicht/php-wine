<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=user_db', 'root', 'xns3hs1a');
}
catch(Exception $e)
{
        die('error : '.$e->getMessage());
}

function register_post($username,$comment){
   global $bdd;
   $query = $bdd->prepare('INSERT INTO forum (username,content,time) VALUES (:user,:content,NOW())');
   $query->execute(array(
      'user' => $_SESSION['username'],
      'content' => $comment)) or die(print_r('error' .$bdd->errorInfo()));
  return true;
} 
?>
