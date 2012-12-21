<?php 

include_once '/opt/lampp/htdocs/server/model/connectdb.php';
$bdd = connectDb('db_vins');

//============================================================
//HELPER FUNCTIONS





//==========================   MAIN   ===================================

function search_wine($data){
	foreach($data as $key=>$val){
		if($val!=''){
			echo 'key: '.$key.' val: '.$val.'</br>';
		}

	}






}

?>