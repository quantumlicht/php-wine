<?php 
abstract class Personnage {

//===================================================
// protected VARIABLES
//===================================================

	protected $_id;
	protected $_nom;
	protected $_force;
	protected $_degats;
	protected $_niveau;
	protected $_experience;

	protected static $_texteADire = 'Allo tout le monde';

//===================================================
// CONSTANTS
//===================================================

	const FORCE_PETITE = 1;
  	const FORCE_MOYENNE = 5;
  	const FORCE_GRANDE = 20;

	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;

//===================================================
//	PUBLIC METHODS
//===================================================

  	public function hydrate(array $donnees){

  		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
		
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}	
  		}
  	}

  	public function validName(){

  		return is_string($this->_nom)&& strlen($this->_nom)<=20;
  	}

	public function frapper(Personnage $persoToHit){
		if($persoToHit->id() == $this->_id){
			return self::CEST_MOI;
		}
		return $persoToHit->recevoirDegats($this->_force);
	}

	public function recevoirDegats($dommage){

		$this->_degats += $dommage;

		if($this->_degats>=100)
		{
			return self::PERSONNAGE_TUE;
		}
		
		return self::PERSONNAGE_FRAPPE;
	}

	public function gagnerExperience(){

		$this->_experience +=100;
	}

	public function afficherExperience(){
	
		echo $this->_experience;
	}

	//=============================================================
	// STATIC METHODS
	//=============================================================

		public static function parler(){
			echo self::$_texteADire;
		}

//===================================================
// CONSTRUCTOR
//===================================================

	public function __construct(array $donnees){
		$this->hydrate($donnees);
	}

//===================================================
//	GETTERS
//===================================================

	public function id(){return $this->_id;}

	public function nom(){return $this->_nom;}

	public function force(){return $this->_force;}

	public function degats(){return $this->_degats;}

	public function niveau(){return $this->_niveau;}

	public function experience(){return $this->_experience;}

//===================================================
//	SETTERS
//===================================================

	public function setId($id){
		$id = (int) $id;
		if ($id > 0){
			$this->_id =$id;
		}
	}

	public function setNom($nom){
		if(is_string($nom)){
			$this->_nom = $nom;
		}
	}

	public function setForce($force){
		$force = (int) $force;
		if ($force<=0 || $force>=100) {
				trigger_error('La force du personnage doit etre inferieure a 100',E_USER_WARNING);
		}
		$this->_force = $force;
	}	

	public function setExperience($experience){
		$experience = (int) $experience;
		if (!is_int($experience)) {
			trigger_error('L\'experience du personnage doit etre un entier numerique',E_USER_WARNING);
			return;
		}
		if ($experience >($this->_niveau+1)*100 || $experience < 0){
			trigger_error('L\'experience du personnage doit etre inferieure a 100 fois son niveau',E_USER_WARNING);
			return;
		}
		$this->_experience = $experience;
	}

	public function setDegats($degats){
	   $degats = (int) $degats;
    	if ($degats >= 0 && $degats <= 100)
   	{
   	   $this->_degats += $degats;
	 	}
		
	}

	public function setNiveau($niveau){
		 $niveau = (int) $niveau;
	    if ($niveau >= 1 && $niveau <= 100)
	    {
	      $this->_niveau = $niveau;
	    }
	}

}

//=============================================================
//                      UNIT TEST
//=============================================================

function loadClass($classe)
{
  require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('loadClass'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
session_unset();
session_start();


if(isset($_GET['deconnexion'])){
	session_destroy();
	header('Location: .');
	exit();
}
 
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'xns3hs1a');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) {		
	$perso = $_SESSION['perso'];
}

if(isset($_POST['creer']) && isset($_POST['nom'])){
	$perso = new Personnage(array('nom'=>$_POST['nom']));

	if (!$perso->validName()){
		$message = 'Le nom choisi est invalide.';
 		unset($perso);
	}
	elseif($manager->exists($perso->nom())){
		$message = 'Ce personnage existe deja.';
 		unset($perso);	
	}
	else{
		$manager->add($perso);
	}
}
elseif(isset($_POST['utiliser'])&& isset($_POST['nom'])){
	if ($manager->exists($_POST['nom'])){
		$perso = $manager->get($_POST['nom']);
	}
	else{
		$message = 'Ce personnage n\'existe pas.';
	}
}
elseif(isset($_GET['frapper'])){
	if(!isset($perso)){
		$message = 'Merci de créer un personnage ou de vous identifier.';
	}
	else{
		if( !$manager->exists((int) $_GET['frapper']) ){
			$message = 'Le personnage que vous voulez frapper n\'existe pas !';
		}
		else{
			$persoAFrapper= $manager->get((int) $_GET['frapper']);
			$retour = $perso->frapper($persoAFrapper);

			switch ($retour) {
				case Personnage::CEST_MOI:
				 	$message = 'Mais... pourquoi voulez-vous vous frapper ???';
					break;
				case Personnage::PERSONNAGE_FRAPPE:
					$message = 'Le personnage a bien été frappé !';
					$manager->update($perso);
					$manager->update($persoAFrapper);
					break;
				case Personnage::PERSONNAGE_TUE:
					$message = 'Le personnage est mort!';
					$perso->gagnerExperience();
					if($perso->experience()>=$perso->niveau()*100){
						$message .= ' LEVEL UP';	
						$perso->setNiveau($perso->niveau()+1);
						$perso->setForce($perso->force()+5);
						$perso->setExperience(0);
						$perso->setDegats(0);
					}
					$manager->update($perso);
					$manager->delete($persoAFrapper);
					break;		
			}
		}
	}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  </head>
  <body>
  	<p>Nombre de perso Cree : <?php echo $manager->count(); ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
	echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}
if (isset($perso))
{
?>
	<p><a href="?deconnexion=1">Déconnexion</a></p>

	<fieldset>
   	<legend>Mes informations</legend>
   	<p>
     		Nom : <?php echo htmlspecialchars($perso->nom()); ?><br />
     		Force : <?php echo $perso->force(); ?>
     		Niveau : <?php echo $perso->niveau(); ?>
   	</p>
	</fieldset>
 
	<fieldset>
   	<legend>Qui frapper ?</legend>
   	<p>
<?php
$persos = $manager->getList($perso->nom());
if (empty($persos))
{
	echo 'Aucun perso a frapper!';
}
else
{
	foreach($persos as $person){
		echo '<a href="?frapper=', $person->id(), '">', htmlspecialchars($person->nom()), '</a> (niveau:',$person->niveau(),'   dégâts : ', $person->degats(), ')<br />';
	}
}
?>
   	</p>
	</fieldset>
<?php
}
else
{
?>
   <form action="" method="post">
   	<p>
     		Nom : <input type="text" name="nom" maxlength="50" />
     		<input type="submit" value="Créer ce personnage" name="creer" />
     		<input type="submit" value="Utiliser ce personnage" name="utiliser" />
		</p>
		</form>
<?php
}
?>
	</body>
</html>

<?php
if (isset($perso)){
	$_SESSION['perso'] = $perso;
}
?>


