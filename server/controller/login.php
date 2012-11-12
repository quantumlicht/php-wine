<?php

if(!isset($_SESSION['username'])) {
   include_once('/opt/lampp/htdocs/server/view/login.php');  
}
else{
   include_once('/opt/lampp/htdocs/server/view/logout.php');  
}

?>
