<?php class phpUtils {

//===================================================================
// PUBLIC VARIABLES
//===================================================================


//===================================================================
// PRIVATE VARIABLES
//===================================================================

private $_dbpassword = 'xns3hs1a';
private $_dbusername = 'root';
private $_hostname ='localhost';

private $_dbnames = ['db_vins','user_db'];

private $_domain = 'http://philippeguay.com/';
private $_mois = ['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'];
private $_arome_saveur = ['Animal','Boisé','Épicé','Floral','Fruité','Végétal'];
private $_acidite = ['Mou','Frais','Vif','Nerveux','Mordant','Excessif'];
private $_tanin = ['Fins','Soyeux','Râpeux','Rugueux','Astringents']; 

//===================================================================
//CONTRUCTOR
//===================================================================
public function __construct(){


}


//===================================================================
//ACCESSOR
//===================================================================

public function domain(){
	return $this->_domain;
}

public function mois(){
	return $this->_mois;
}

public function arome(){
	return $this->_arome_saveur;
}

public function saveur(){
	return $this->_arome_saveur;
}

public function acidite(){
	return $this->_acidite;
}

public function tanin(){
	return $this->_tanin;
}


//===================================================================
//MUTATORS
//===================================================================





//===================================================================
//PUBLIC FUNCTIONS
//===================================================================
public function connect_db($dbname){
	if(in_array($dbname, $this->_dbnames)){	
		try{
			$bdd = new PDO('mysql:host='.$this->_hostname.';dbname='.$dbname,$this->_dbusername,$this->_dbpassword);
		}
		catch(Exception $e){
			die('Error : '. $e->getMessage());
		}

		return $bdd;
	}
	else{
		echo '</br>cannot load '. $dbname.' database';
	}
}

}?>