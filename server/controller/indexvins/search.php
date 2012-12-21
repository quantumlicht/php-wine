<?php 
include_once('/opt/lampp/htdocs/server/model/indexvins/get_encepagement.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_pays.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_tags.php');
include_once('/opt/lampp/htdocs/server/model/indexvins/get_couleur.php');
session_start();


include_once('/opt/lampp/htdocs/server/controller/header.php');
$a = new Utils();
$a->connect_db('test');
$a->connect_db('db_vins');


include_once('/opt/lampp/htdocs/server/view/indexvins/search.php');

?>
