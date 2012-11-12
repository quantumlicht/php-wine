<?php

function check_user_db($username,$password)
{
   global $bdd;
   $query= $bdd->prepare('SELECT userID FROM users WHERE username= :user AND password= :pass');
   $query->execute(array(
   'user'=>$username,
   'pass'=>$password));

   $query_result= $query->fetch();
   return $query_result;
}

?>
