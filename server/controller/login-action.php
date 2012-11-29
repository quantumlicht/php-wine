<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/connectdb.php');
include_once('/opt/lampp/htdocs/server/model/check_user_db.php');

if (!isset($_POST['username'])|| $_POST['username']=='' || !isset($_POST['password']) || $_POST['password']== ''){
   Header('Location: http://philippeguay.com/qlicht.php');
   die();
}

$password = sha1($_POST['password']);
$username = trim($_POST['username']);
$query_result=check_user_db($username,$password);

if (!$query_result){
   Header('Location: http://philippeguay.com/qlicht.php');
}
else{
   $_SESSION['username'] = $username;
   
   if (isset($_POST['rememberMe']) ) {
      setcookie('username', $username, time() + 1*24*60*60, null, null, false, true);
      setcookie('password', $password, time() + 1*24*60*60, null, null, false, true);
   }
   else{
      //destroy any previously set cookie
      setcookie('username', '', time() - 1*24*60*60);
      setcookie('password', '', time() - 1*24*60*60);
   }
   Header('Location: http://philippeguay.com/controller/qlicht/member_homepage.php');
}

die();
?>
