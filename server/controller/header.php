<?php

function loadClass($class)
{
  include_once ('/opt/lampp/htdocs/server/classes/'.$class . '.class.php'); // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('loadClass'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

function getActiveTab($requestUri) {
	$bClassSet=false;
   $dropdownEle = explode(',',$requestUri);
   foreach ($dropdownEle as $key => $value) {
      $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
      if ($current_file_name == $value & !$bClassSet){
      	$bClassSet = true;
      	return 'active';
     	}
   }
}   

include_once('/opt/lampp/htdocs/server/view/header.php');
include_once('/opt/lampp/htdocs/server/controller/login.php');
?>
