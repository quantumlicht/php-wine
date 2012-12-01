<?php

   function getActiveTab($requestUri) {
      $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
      
      if ($current_file_name == $requestUri)
        echo 'class="active"';
   }   

   include_once('/opt/lampp/htdocs/server/view/header.php');
   include_once('/opt/lampp/htdocs/server/controller/login.php');
?>
