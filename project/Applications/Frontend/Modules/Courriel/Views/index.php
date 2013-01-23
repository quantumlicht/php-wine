<html>
<body>
 <form action="" method="post">
    <?php echo $form; ?>
    <input class='btn btn-primary' type="submit" value="Commenter" />
   </form>
<?php
$to = "admin@localhost.com";
$subject = "Test mail";
$comment = "Hello! This is a simple email message.";
$from = "philippe.guay@radialpoint.com";
$headers = "From:" . $from;

if(mail($to, $subject, $comment, $headers)) {
   echo '<p>Hey, it went through! Thanks, </p>';
}
else
{
   echo '<p>Ooops! Didn\'t work.</p>';
}
?>
</body>
</html>
