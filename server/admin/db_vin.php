<a href='http://philippeguay.com/admin'>Retour page admin</a>
<?php
$con = mysql_connect("localhost","root","xns3hs1a");
if (!$con)
   {
   die('Could not connect :' . mysql_error());
   }

if (mysql_query("CREATE DATABASE db_vins",$con))
   {
   echo 'Database created';
   }
   else 
   {
   echo "Error creating database: " . mysql_error();
   }
