<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql = "CREATE TABLE IF NOT EXISTS `encepagement`(
`vinID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`1` varchar(50) NOT NULL default '',
`2` varchar(50) default '',
`3` varchar(50) default '',
`4` varchar(50) default '',
`5` varchar(50) default ''
)";

if(mysql_query($sql,$con)){
   echo '</br> table encepagement created';
}
else{
   echo "</br>Error creating table encepagement " . mysql_error();
}
?>
