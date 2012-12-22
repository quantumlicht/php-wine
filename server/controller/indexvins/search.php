<?php 
include_once('/opt/lampp/htdocs/server/model/indexvins/get_encepagement.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_pays.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_tags.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_couleur.php');
include_once('/opt/lampp/htdocs/server/controller/header.php');
session_start();

$utils = new phpUtils();
$utils->connect_db('db_vins');


include_once('/opt/lampp/htdocs/server/view/indexvins/search.php');

?>
