<?php
include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('user_db');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
   include_once('/opt/lampp/htdocs/server/controller/qlicht/index.php');
}
?>
