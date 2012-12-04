<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);


$sql_rouge = "CREATE TABLE IF NOT EXISTS `vin_rouge`(
`vinID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(50) NOT NULL default '',
`producteur` varchar(50) NOT NULL default '',
`annee` YEAR NOT NULL,
`appelation` varchar(255)  NOT NULL default '',
`pays` varchar(30) NOT NULL default '',
`region` varchar(50) NOT NULL default '',
`alcool` DECIMAL(5,3),
`date` DATE,
`code-saq` INT UNSIGNED,
`prix` DECIMAL NOT NULL,
`nez-intensite` INT UNSIGNED NOT NULL,
`arome` varchar(30) NOT NULL default '',
`nez-impression` TEXT default '',
`bouche-intensite` SMALLINT UNSIGNED NOT NULL,
`persistance` SMALLINT  UNSIGNED NOT NULL,
`saveur` varchar(30) NOT NULL default '',
`acidite` varchar(30) NOT NULL default '',
`tanin` varchar(30) NOT NULL default '',
`bouche-impression` TEXT default '',
`impression-ensemble` TEXT default '',
UNIQUE KEY `name` (`name`),
UNIQUE KEY `code-saq` (`code-saq`)
)";


if(mysql_query($sql_rouge,$con)){
   echo '</br> table vins rouges created';
}
else{

   echo "</br>Error creating table rouge " . mysql_error();
}


?>
