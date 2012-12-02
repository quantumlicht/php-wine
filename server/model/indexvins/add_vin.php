<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}  
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}
    
function add_vin($data){
   foreach($data as $key=>$value){
      if(!isset($data[$key]) || $data[$key]==''){
        echo 'variable '. $key. ' not set or empty.</br>';
      }
      echo $key . ' '.$value. '</br>';
   }
}
//   foreach($data['encepagement'] as $key => $value){
 //     echo $key . ' '  .$value . '</br>';
//   }
//   echo '</br>'.$data['pays'];
//   global $bdd;
//   $query = $bdd->prepare('INSERT INTO  (username,content,time) VALUES (:user,:content,NOW())');
//   $query->execute(array(
//     'user' => $_SESSION['username'],
//      'content' => $comment)) or die(print_r('error' .$bdd->errorInfo()));
//  return true;
//} 
?>

