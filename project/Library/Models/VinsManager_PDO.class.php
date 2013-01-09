<?php
namespace Library\Models;

use \Library\Entities\Fichevin;

class VinsManager_PDO extends VinsManager
{
  protected function add(Fichevin $fichevin)
  {
    $q = $this->dao->prepare('INSERT INTO fichevins SET utilisateur = :utilisateur, courriel = :courriel, motdepasse = :motdepasse, dateAjout = NOW()');
    
    $q->bindValue(':utilisateur', $fichevin->utilisateur(), \PDO::PARAM_INT);
    $q->bindValue(':courriel', $fichevin->courriel());
    $q->bindValue(':motdepasse', sha1($fichevin->motdepasse()));
    
    $q->execute();
    
    $fichevin->setId($this->dao->lastInsertId());
  }

  public function getPays()
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }
  
  public function getEncepagement($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getTeinte($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getAcidite()
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getTanin($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function isAuthenticated(Fichevin $fichevin )
  {
    $q = $this->dao->prepare('SELECT id FROM fichevins WHERE utilisateur= :utilisateur AND motdepasse= :motdepasse');

    $q->bindValue(':utilisateur',$fichevin->utilisateur());
    $q->bindValue(':motdepasse',$fichevin->motdepasse());

    $q->execute();
    
    return $q->fetch();
  }
  
   protected function modify(Fichevin $fichevin)
  {
    $q = $this->dao->prepare('UPDATE fichevins SET utilisateur = :utilisateur, courriel = :courriel, motdepasse = :motdepasse, dateAjout = NOW() WHERE id = :id');
    
    $q->bindValue(':utilisateur', $comment->utilisateur());
    $q->bindValue(':courriel', $comment->utilisateur());
    $q->bindValue(':motdepasse', sha1($comment->motdepasse()));
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
}
