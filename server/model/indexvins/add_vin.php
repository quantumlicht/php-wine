<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}  
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}

# remove by key:
function array_remove_key ()
{
  $args  = func_get_args();
  return array_diff_key($args[0],array_flip(array_slice($args,1)));
}

    
function add_vin($data){
  
  $table = $data['couleur']==1 ? 'rouge':'blanc';
  $arrEncepagement = $data['encepagement'];
  $arrTags = explode(',',$data['tags']);

  $data = $data['couleur']==1 ? $data : array_remove_key($data,'tanin');
  $new_data = array_remove_key($data,'couleur','encepagement','tags');


//---------------------------------------------------------------------

  $new_data['code_saq'] = intval($new_data['code_saq']);
  $new_data['date'] = $new_data['date_annee'].'-'.$new_data['date_mois'].'-'.$new_data['date_jour'];
  $new_data = array_remove_key($new_data,'date_annee','date_mois','date_jour');

  //DEBUG
  foreach($new_data as $key=>$value){
      if(!isset($data[$key]) || $data[$key]==''){
        echo 'variable '. $key. ' not set or empty.</br>';
      }
      echo $key . ' '.$value. '</br>';
   }

//=====================================================================
// MAIN QUERY
   $strQuery = 'INSERT INTO vin_'. $table . ' SET ';
   foreach($new_data as $key=>$value){
      $strQuery .= (string)$key.'=\''.addslashes((string)$value).'\', ';
   }
 
   $strQuery = substr($strQuery,0,-2); //remove the last ', '
    //DEBUG
    echo $strQuery;
 
   global $bdd;
   $query = $bdd->exec($strQuery);
//======================================================================
// ENCEPAGEMENT STORE INSERT
   $strQuery = 'INSERT INTO `encepagement_store`(`encepagementId`,`vinId`) VALUES'; 
   $strEncepagement = array();
   foreach($arrEncepagement as $encepagement){
      $strEncepagement[]= '(\''. $encepagement .'\',\''.$bdd->lastInsertId() .'\')';   
   }
   $strQuery.=implode(',',$strEncepagement);
   $strQuery.=';';
   
   //DEBUG
   echo '</br> encepagement store query ==>'.$strQuery;
   $qEncepagement = $bdd->exec($strQuery);



 
} 
?>

