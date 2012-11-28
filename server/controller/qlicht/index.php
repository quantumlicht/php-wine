<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/qlicht/get_users.php');
include_once('/opt/lampp/htdocs/server/controller/header.php');
include_once('/opt/lampp/htdocs/server/model/check_user_db.php');
$users = get_users();
foreach($users as $key => $user)
{
   $users[$key]['username'] = htmlspecialchars($user['username']);
   $users[$key]['email'] = nl2br(htmlspecialchars($user['email']));
}

            
if(!isset($_SESSION['username'])) {
      //check the cookie
      if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
         $query_result=check_user_db($_COOKIE['username'],$_COOKIE['password']);

         if(!$query_result) {
           // header('location: http://localhost/server/controller/qlicht/index.php');
         }
         else{
           $_SESSION['username'] = $_COOKIE['username'];
           header('location: http://philippeguay.com/server/controller/qlicht/member_homepage.php');
           die();
         }
      }
      else {
         include_once('/opt/lampp/htdocs/server/view/qlicht/index.php');
      }
}
else{
   include_once('/opt/lampp/htdocs/server/view/qlicht/member_homepage.php');
}



?>
