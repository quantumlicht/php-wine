<?php
include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('user_db');
function register_post($username,$comment){
   global $bdd;
   $query = $bdd->prepare('INSERT INTO forum (username,content,time) VALUES (:user,:content,NOW())');
   $query->execute(array(
      'user' => $_SESSION['username'],
      'content' => $comment)) or die(print_r('error' .$bdd->errorInfo()));
  return true;
} 
?>
