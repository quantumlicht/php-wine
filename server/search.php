<?php
include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

if (!isset($_GET['section']) OR $_GET['section'] == 'search')
{
   include_once('/opt/lampp/htdocs/server/controller/indexvins/search.php');
}
?>
