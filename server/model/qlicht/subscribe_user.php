<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=user_db', 'root', 'xns3hs1a');
}
catch(Exception $e)
{
        die('error : '.$e->getMessage());
}


if (preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i',$_POST['email']) AND !preg_match('/[\s]/',$_POST['username']) AND $_POST['typePass']==$_POST['retypePass'] AND strlen($_POST['typePass']) > 3 )
{
   $hashed_pass = sha1($_POST['typePass']);
   $request = $bdd->prepare('INSERT INTO users (username, email, password, lastLogin) VALUES(:user, :email, :pass,NOW())');
   $request->execute(array(
      'user' => $_POST['username'],
      'email' => $_POST['email'],
      'pass' =>  $hashed_pass)) or die(print_r($bdd->errorInfo()));
   header('Location: http://philippeguay.com/server/qlicht.php?accountCreationStatus=success');
}
else
{
header("Location: http://philippeguay.com/server/controller/qlicht/subscribe.php?subscribestatus=invalid");
exit;
}
?>




