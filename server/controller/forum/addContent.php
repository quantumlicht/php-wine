<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/forum/register_post.php');
if(!isset($_POST['comment'])|| $_POST['comment']==''){
   Header('Location: http://philippeguay.com/server/forum.php');
}
//TODO: add additional verification for post

$query_result=register_post($_SESSION['username'],$_POST['comment']);

if ($query_result){
   header('Location: http://philippeguay.com/server/forum.php');
}
else{
   header('Location: http://philippeguay.com/server/controller/forum/index.php?postcomment=error');
}

?>

