<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/indexvins/add_vin.php');

$query_result = add_vin($_POST);

if ($query_result){
   header('Location: http://philippeguay.com/indexvins.php?submit=ok');
}        
else{
   header('Location: http://philippeguay.com/indexvins.php?submit=fail');
}
 
?>
 

