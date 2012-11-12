<?php
session_start();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('username', '', time() - 1*24*60*60);
setcookie('password', '', time() - 1*24*60*60);
Header('Location: http://localhost/server/qlicht.php');

?>
