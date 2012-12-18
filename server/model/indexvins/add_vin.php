<?php

include_once('/opt/lampp/htdocs/server/model/connectdb.php');
$bdd = connectDb('db_vins');

//=======================================================================
//HELPER FUNCTIONS
# remove by key:
function array_remove_key ()
{
  $args  = func_get_args();
  return array_diff_key($args[0],array_flip(array_slice($args,1)));
}

function get_tag_in_list($tag){
  $q = 'SELECT * FROM `tags` WHERE tag=\''.$tag.'\';'; 
  global $bdd;
  $query = $bdd->prepare($q);
  $query->execute();
  $result = $query->fetchAll(); 
  return $result;
}
    
function get_cepage_in_list($cepage){
  $q = 'SELECT * FROM `encepagements` WHERE encepagement=\''.$cepage.'\';'; 
  global $bdd;
  $query = $bdd->prepare($q);
  $query->execute();
  $result = $query->fetchAll(); 
  return $result;
}
    
//==========================================================================
function add_vin($data){
  
  $arrEncepagement = explode(',',$data['encepagement']);
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
   $wineId = $bdd->lastInsertId();
//======================================================================
// ENCEPAGEMENT STORE INSERT
   $strQuery = 'INSERT INTO `encepagement_store`(`encepagementId`,`vinId`) VALUES'; 
   $strEncepagement = array();
   foreach($arrEncepagement as $key=>$encepagement){
      echo '</br> TEST {'. $encepagement.'}';
      $results = get_cepage_in_list($encepagement);
      $is_in_cepage_list = count($results) !=0;
      if($is_in_cepage_list){
         $cepageId = $results[0]['encepagementID'];
         $strCepage[] = '(\''. $cepageId .'\',\''. $wineId . '\')';
      }
      else{
         // first register cepage in cepages list, then add the wine id and new ceoageid into cepage store
         $qNewCepage = 'INSERT INTO `db_vins`.`encepagements` (`encepagementID`,`encepagement`,`status`) VALUES (NULL,\''. $encepagement.'\',\'pending\');';
         echo '</br> new encepagement query ==>'.$qNewCepage;
         $response = $bdd->exec($qNewCepage); 
         $newCepageId = $bdd->lastInsertId();
       
         // then we can link this new cepage to cepage_store
         $strEncepagement[] = '(\''. $newCepageId .'\',\''. $wineId . '\')';
      }
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
   $strTag = array();
   
    
   foreach($arrTags as $key=>$tag){
      $results =  get_tag_in_list($tag);   
      $is_in_tag_list = count($results) !=0;

      if($is_in_tag_list){
         $tagId = $results[0]['tagID'];
         $strTag[] = '(\''. $tagId .'\',\''. $wineId . '\')';
      }
      else{
         // first register tag in tags list, then add the winte id and new tag id into tag store
         $qNewTag = 'INSERT INTO `db_vins`.`tags` (`tagID`,`tag`,`tooltip`,`status`) VALUES (NULL,\''. $tag.'\',\'\',\'pending\');';
         echo '</br> new tag query ==>'.$qNewTag;
         $response = $bdd->exec($qNewTag); 
         $newTagId = $bdd->lastInsertId();
       
         // then we can link this new tag to tag_store
         $strTag[] = '(\''. $newTagId .'\',\''. $wineId . '\')';
      }
   }
   $basequery.= implode(',',$strTag);
   $basequery.=';';

   echo '</br> tags store querty ==>'. $basequery;
   $qTag = $bdd->exec($basequery);

   //VALIDATION IF WE SHOULD CONSIDER THIS WAS A SUCCES OR NOT
   $submissionState=true;
   return $submissionState; 
} 
?>

