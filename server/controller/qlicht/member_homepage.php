<?php
session_start();
include_once('/opt/lampp/htdocs/server/controller/header.php');
include_once('/opt/lampp/htdocs/server/model/check_user_db.php');


if(!isset($_SESSION['username'])) {
      //check the cookie
      if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
         //cookie found, is it really someone from the
         $query_result=check_user_db($_COOKIE['username'],$_COOKIE['password']);

         if(!$query_result) {
            header('location: http://localhost/server/qlicht.php');
         }
         else{
           $_SESSION['username'] = $_COOKIE['username'];
           include_once('/opt/lampp/htdocs/server/view/qlicht/member_homepage.php');
         }
      }
      else {
         header('location: http://localhost/server/qlicht.php');
      }
}
else{
  include_once('/opt/lampp/htdocs/server/view/qlicht/member_homepage.php');
}





?>

