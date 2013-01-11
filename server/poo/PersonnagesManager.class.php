<?php 

class PersonnagesManager{

//===================================================
// PRIVATE VARIABLES
//===================================================
	private $_db;

//===================================================
// CONSTANTS
//===================================================


//===================================================
//	PUBLIC METHODS
//===================================================

	public function setDb(PDO $db)
  	{
		$this->_db = $db;
  	}

 	public function add(Personnage $perso)
  	{
  		$perso->hydrate(array(
  			'force'=>Personnage::FORCE_MOYENNE,
		   'degats'=>0,
		   'experience'=>0,
		   'niveau'=>1));

		$q = $this->_db->prepare('INSERT INTO `personnages` SET `nom` = :nom, `force` = :force, `degats` = :degats, `niveau` = :niveau, `experience` = :experience;');

		$q->bindValue(':nom', $perso->nom());
		$q->bindValue(':force', $perso->force());
		$q->bindValue(':degats', $perso->degats());
		$q->bindValue(':niveau', $perso->niveau());
		$q->bindValue(':experience', $perso->experience());
		$q->execute();

		$perso->hydrate(array(
			'id'=>$this->_db->lastInsertId()
			));
	}

	public function count(){
		return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
	}

  	public function delete(Personnage $perso)
  	{
		$this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  	}

	public function exists($info)
	{
		if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
		{
			return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
		}

		// Sinon, c'est qu'on veut vérifier que le nom existe ou pas.

		$q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
		$q->execute(array(':nom' => $info));

		return (bool) $q->fetchColumn();
	}
	public function get($info)
	{
		if(is_int($info)){
			$q = $this->_db->query('SELECT `id`, `nom`, `force`, `degats`, `niveau`, `experience` FROM `personnages` WHERE `id` = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			return new Personnage($donnees);
		}
		else{			
			$q = $this->_db->prepare('SELECT `id`, `nom`, `force`, `degats`, `niveau`, `experience` FROM `personnages` WHERE `nom` = :nom');
			$q->execute(array(':nom' => $info));

			return new Personnage($q->fetch(PDO::FETCH_ASSOC));
		}
	}	

	public function getList($nom)
	{
		$persos = array();

 		$q = $this->_db->prepare('SELECT `id`, `nom`, `force`, `degats`, `niveau`, `experience` FROM `personnages` WHERE `nom` <> :nom ORDER BY `nom`');
 		$q->execute(array(':nom' => $nom));

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
		$persos[] = new Personnage($donnees);
		}

		return $persos; 
	}

	public function update(Personnage $perso)
	{
 		$q = $this->_db->prepare('UPDATE `personnages` SET `force` = :force, `degats` = :degats, `niveau` = :niveau, `experience` = :experience WHERE `id` = :id');

		$q->bindValue(':force', $perso->force(), PDO::PARAM_INT);
		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
		$q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
		$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$q->execute();
	}

	//=============================================================
	// STATIC METHODS
	//=============================================================



//===================================================
// CONSTRUCTOR
//===================================================
	public function __construct($db){
		$this->setDb($db);
	}


//===================================================
//	GETTERS
//===================================================



//===================================================
//	SETTERS
//===================================================




//=============================================================
//                      CLASS UNIT TEST
//=============================================================

}
?>
