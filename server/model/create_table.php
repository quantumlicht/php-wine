<?php

$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

mysql_select_db("user_db",$con);
   
$query= "CREATE TABLE `forum`(
   `postID` INT NOT NULL AUTO_INCREMENT,
   `username` varchar(50) NOT NULL default '',
   `content` TEXT NOT NULL default '',
   `time` datetime,
    PRIMARY KEY (`postID`)   
  )";

if(mysql_query($query,$con)){
   echo '</br>forum table created';
}
else{
   echo '</br> creating forum table failed';
}


?>


