<?php

$to = "guay.philippe@gmail..com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "someonelse@example.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

Header('Location: http://philippeguay.com/qlicht.php');

?>
