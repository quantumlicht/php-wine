<?php

include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

$strQ = 'SELECT * FROM `db_vins`.`tags` WHERE status=\'pending\'';
$q = $bdd->prepare($strQ);
$q->execute();
$results = $q->fetchAll();


if(isset($_GET['approve'])){
   if($_GET['approve']!=''){
      $strQ = 'UPDATE `db_vins`.`tags` SET `status`=\'approved\' WHERE `tagID`=\''.$_GET['approve'].'\';';
      $q = $bdd->prepare($strQ);
      $q->execute();
      echo $strQ;
      Header('Location: http://philippeguay.com/admin/tag_validation.php');
   }
}
if(isset($_GET['delete'])){
   if($_GET['delete']!=''){
      $strQ = 'DELETE FROM `db_vins`.`tags` WHERE `tagID`=\''.$_GET['delete'].'\';
      DELETE FROM `db_vins`.`tag_store` WHERE `tagId`=\''.$_GET['delete'].'\';';
      $q = $bdd->prepare($strQ);
      $q->execute();
      echo $strQ;
      Header('Location: http://philippeguay.com/admin/tag_validation.php');
   }
}

?>


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script type='text/javascript' src='http://philippeguay.com/jquery/jquery.js'></script>
  <link href="http://philippeguay.com/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type='text/javascript' src='http://philippeguay.com/bootstrap/js/bootstrap.min.js'></script>
      
  <title>VinsIndexWine</title>
</head>   
<div class='row-fluid'>
   <div class='span4 offset4'> 
      <table class='table table-hover'>
         <caption>Tags pending approval </caption>
         <thead>
            <th>TagId</th>
            <th>Tag Name</th>
            <th>Status</th>
            <th>Action</th>
         </thead>
         <tbody>
         <?php foreach ($results as $result){
          echo '<tr><td>'. $result['tagID']. '</td><td>' .$result['tag']. '</td><td> ' . $result['status'].'</td><td><a href="?delete='.$result['tagID'].'">Delete</a> <a href="?approve='.$result['tagID'].'">Approve</a></td></tr>';

            
          } ?>
         </tbody>      
      </table>
   </div>
</div>
