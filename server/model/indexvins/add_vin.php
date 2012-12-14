<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=db_vins', 'root', 'xns3hs1a');
}  
catch(Exception $e)
{
   die('error : '.$e->getMessage());
}

//=======================================================================
//HELPER FUNCTIONS
# remove by key:
function array_remove_key ()
{
  $args  = func_get_args();
  return array_diff_key($args[0],array_flip(array_slice($args,1)));
}

function is_in_tag_list($tag){
  $q = 'SELECT * FROM `tags` WHERE tag=\''.$tag.'\';'; 
  global $bdd;
  $query = $bdd->prepare($q);
  $query->execute();
  $result = $query->fetchAll(); 
  return  count($result)!=0;
}
    
//==========================================================================
function add_vin($data){
  
  $arrEncepagement = $data['encepagement'];
  $arrTags = explode(',',$data['tags']);

  $data['couleur'] = $data['couleur']==1 ? 'rouge':'blanc';
  $data = $data['couleur']==1 ? $data : array_remove_key($data,'tanin');
  $new_data = array_remove_key($data,'encepagement','tags');


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
   $strQuery = 'INSERT INTO vins SET ';
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


//======================================================================
// TAGS STORE INSERT

// Validation si le tag existe
   $basequery = 'INSERT INTO `tag_store` (`tagId`,`vinId`) VALUES';
   foreach($arrTags as $key=>$tag){
      if(is_in_tag_list($tag)){
         echo '</br>'. $tag.  ' is in</br>';
      }
      else{
         echo '</br>'. $tag.' is out </br>';
      }
      
   }



 
} 
?>

