<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql = "CREATE TABLE IF NOT EXISTS `encepagement_rouge`(
`encepagementID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`encepagement` varchar(50) NOT NULL default ''
)";

if(mysql_query($sql,$con)){
   echo '</br> table encepagement_rouge created';
}
else{
   echo "</br>Error creating table encepagement_rouge " . mysql_error();
}
?>
