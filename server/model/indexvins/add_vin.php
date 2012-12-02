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
  $table= $data['couleur']==1 ? 'rouge':'blanc';
  echo $table . '</br>';
   foreach($data as $key=>$value){
      if(!isset($data[$key]) || $data[$key]==''){
        echo 'variable '. $key. ' not set or empty.</br>';
      }
      echo $key . ' '.$value. '</br>';
   }
}
//   echo '</br>'.$data['pays'];
//   global $bdd;
//   $query = $bdd->prepare('INSERT INTO :table (username,content,time) VALUES (:user,:content,NOW())');
//   $query->execute(array(
//     'table =>'vin_'.$table; 
//     'user' => $_SESSION['username'],
//      'content' => $comment)) or die(print_r('error' .$bdd->errorInfo()));
//  return true;
//} 
?>

