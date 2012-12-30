<?php

$utils = new phpUtils();
$bdd =  $utils->connect_db('db_vins');

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