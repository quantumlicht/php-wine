<?php 
class Compteur{

	private static $_inc = 0;


	public function __construct(){
		self::$_inc++;
	}

	public static function get_nb_instances(){
		echo 'Il y a'. self::$_inc .'instances de crees.</br>';
	}

}

?>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<?php
$inst_a = new Compteur();
Compteur::get_nb_instances();
$inst_b = new Compteur();
Compteur::get_nb_instances();

?>