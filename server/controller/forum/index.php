<?php
session_start();
include_once('/opt/lampp/htdocs/server/model/forum/get_post.php');
include_once('/opt/lampp/htdocs/server/controller/header.php');

$posts = get_post();
foreach ($posts as $key => $post){
   $posts[$key]['username'] = htmlspecialchars($post['username']);
   $posts[$key]['content'] = nl2br(htmlspecialchars($post['content']));
   $posts[$key]['time'] =  htmlspecialchars($post['time']);
}


include_once('/opt/lampp/htdocs/server/view/forum/index.php');
?>
