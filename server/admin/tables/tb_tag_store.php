<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql = "CREATE TABLE IF NOT EXISTS `tag_store`(
`storeID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`tagId` INT UNSIGNED NOT NULL,
`vinId` INT UNSIGNED NOT NULL
)";

if(mysql_query($sql,$con)){
   echo '</br> table tag_store created';
}
else{
   echo "</br>Error creating table tag_store " . mysql_error();
}
?>
