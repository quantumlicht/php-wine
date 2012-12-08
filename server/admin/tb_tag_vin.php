<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql = "CREATE TABLE IF NOT EXISTS `tag_vin`(
`tagID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`tag` varchar(50) NOT NULL default '',
`tooltip` varchar(250) default ''
)";

if(mysql_query($sql,$con)){
   echo '</br> table tag created';
}
else{
   echo "</br>Error creating table tag " . mysql_error();
}
?>
