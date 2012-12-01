<?php
include_once('/opt/lampp/htdocs/server/model/connectdb.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
   include_once('/opt/lampp/htdocs/server/controller/subscribe/index.php');
}
?>
