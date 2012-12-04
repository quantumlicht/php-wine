<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("db_vins",$con);

$sql_blanc = "CREATE TABLE IF NOT EXISTS `vin_blanc`(
`vinID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nom` varchar(50) NOT NULL default '',
`producteur` varchar(50) NOT NULL default '',
`annee` YEAR NOT NULL,
`appelation` varchar(255)  NOT NULL default '',
`pays` varchar(30) NOT NULL default '',
`region` varchar(50) NOT NULL default '',
`alcool` DECIMAL(5,3),
`date` DATE,
`code_saq` INT UNSIGNED,
`prix` DECIMAL NOT NULL,
`teinte` varchar(20) NOT NULL default '',
`nez_intensite` INT UNSIGNED NOT NULL,
`arome` varchar(30) NOT NULL default '',
`nez_impression` TEXT default '',
`bouche_intensite` SMALLINT UNSIGNED NOT NULL,
`persistance` SMALLINT  UNSIGNED NOT NULL,
`saveur` varchar(30) NOT NULL default '',
`acidite` varchar(30) NOT NULL default '',
`bouche_impression` TEXT default '',
`impression_ensemble` TEXT default '',
UNIQUE KEY `nom` (`nom`),
UNIQUE KEY `code_saq` (`code_saq`)
)";

if(mysql_query($sql_blanc,$con)){
   echo '</br> table vins blancs created';
}
else{

   echo "</br>Error creating table blanc " . mysql_error();
}

