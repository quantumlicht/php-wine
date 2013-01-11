<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql = "CREATE TABLE IF NOT EXISTS `pays`(
`paysID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`pays` varchar(30) NOT NULL
)";

if(mysql_query($sql,$con)){
   echo '</br> table pays created';
}
else{
   echo "</br>Error creating table pays " . mysql_error();
}
$pays = ['Afrique du Sud','Allemagne','Australie','Canada','Chili','Etats-Unis','France','Grèce','Italie','Nouvelle-Zélande','Portugal'];

foreach($pays as $key=>$value){
   $req_pays  = 'INSERT INTO `pays`(`paysId`,`pays`) VALUES (NULL,\'' . $value .'\')';
   if(mysql_query($req_pays,$con)){
      echo '</br> inserted '. $value . ' into table pays.';
   }  
  else{
     echo '</br>Error inserting'. $value .' into  table pays :' . mysql_error();
  }


} 
?>
