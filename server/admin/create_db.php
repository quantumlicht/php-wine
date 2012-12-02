<?php

$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

if (mysql_query("CREATE DATABASE user_db",$con))
   {
   echo 'Database created';
   }
   else
   {
   echo "Error creating database: " . mysql_error();
   }

mysql_select_db("user_db",$con);
$sql = "CREATE TABLE `users`
(
`userID` INT NOT NULL AUTO_INCREMENT,
`username` varchar(50) NOT NULL default '',
`email` varchar(255) NOT NULL default '',
`password` varchar(255) NOT NULL default '',
`lastLogin` datetime,
UNIQUE KEY `user_name` (`username`),
UNIQUE KEY `user_email` (`email`),
PRIMARY KEY (`userID`)
)";

$sql_default_user="INSERT INTO `users` (`username`,`email`,`password`,`lastLogin`)
   VALUES ('admin','guay.philippe@gmail.com',SHA1('test'),NOW())";

if(mysql_query($sql,$con)){
   echo '</br> table created';
}
else{

   echo "</br>Error creating table: " . mysql_error();
}

if(mysql_query($sql_default_user,$con)){
   echo '</br admin created>';
}
else{
   echo "</br>Error creating user: " . mysql_error();
}

mysql_close($con);
?>
