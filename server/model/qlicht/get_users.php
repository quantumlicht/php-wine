<?php 

function get_users()
{
   global $bdd;
   $query = $bdd-> prepare('SELECT * FROM users');
   $query->execute();
   $users = $query->fetchAll();

   return $users;
}

?>
