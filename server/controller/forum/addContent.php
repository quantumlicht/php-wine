<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/forum/register_post.php');
if(!isset($_POST['comment'])|| $_POST['comment']==''){
   Header('Location: http://localhost/server/forum.php');
}
//TODO: add additional verification for post

$query_result=register_post($_SESSION['username'],$_POST['comment']);

if ($query_result){
   header('Location: http://localhost/server/forum.php');
}
else{
   header('Location: http://localhost/server/controller/forum/index.php?postcomment=error');
}

?>

