<?php
namespace Library\Models;

use \Library\Entities\Fichevin;

class VinsManager_PDO extends VinsManager
{
  protected function add(Fichevin $fichevin)
  {
    $query = 'INSERT INTO fichevins SET nom=:nom, producteur=:producteur, annee =:annee, appelation=:appelation, pays=:pays, region=:region,'.
      'alcool=:alcool, date=:date, code_saq=:code_saq, prix=:prix, teinte=:teinte, nez_intensite=:nez_intensite, arome=:arome, bouche_intensite=:bouche_intensite'.
      'persistance=:persistance, saveur=:saveur, acidite=:acidite, couleur=:couleur';
    
    if ($fichevin->couleur()=='rouge')
    {
      $query.=', tanin=:tanin';
    }

    $q = $this->dao->prepare($query);
    

    $q->bindValue(':nom', $fichevin->nom());
    $q->bindValue(':producteur', $fichevin->producteur());
    $q->bindValue(':annee', $fichevin->annee());
    $q->bindValue(':appelation', $fichevin->appelation());
    $q->bindValue(':pays', $fichevin->pays());
    $q->bindValue(':region', $fichevin->region());
    $q->bindValue(':alcool', $fichevin->alcool());
    $q->bindValue(':date', $fichevin->date());
    $q->bindValue(':code_saq', $fichevin->code_saq());
    $q->bindValue(':prix', $fichevin->prix());
    $q->bindValue(':teinte', $fichevin->teinte());
    $q->bindValue(':nez_intensite', $fichevin->nez_intensite());
    $q->bindValue(':arome', $fichevin->arome());
    $q->bindValue(':bouche_intensite', $fichevin->bouche_intensite());
    $q->bindValue(':persistance', $fichevin->persistance());
    $q->bindValue(':saveur', $fichevin->saveur());
    $q->bindValue(':acidite', $fichevin->acidite());
    $q->bindValue(':couleur', $fichevin->couleur());

    if ($fichevin->couleur()=='rouge')
    {
      $q->bindValue(':tanin',$fichevin->tanin());
    }

    $q->execute();
    
    $fichevin->setId($this->dao->lastInsertId());
  }

  public function getAcidite()
  {
    $q = $this->dao->prepare('SELECT `id`,`acidite` FROM  `acidites` ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }

  public function getArome()
  {
    $q = $this->dao->prepare('SELECT `id`,`arome` FROM  `aromes` ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }

  public function getEncepagement($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`encepagement` FROM  `encepagements` WHERE couleur=\''.$couleur.'\' AND NOT `status`=\'pending\' ORDER BY `encepagement`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getPays()
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays1` ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getSaveur()
  {
    $q = $this->dao->prepare('SELECT `id`,`saveur` FROM  `saveurs` ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }
  

  public function getTeinte($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`teinte` FROM  `teintes` WHERE couleur=\''.$couleur.'\' ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }


  public function getTanin($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`tanin` FROM  `tanins` ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }

  public function getTags()
  {
    $q = $this->dao->prepare('SELECT `id`,`tag` FROM  `tags` WHERE NOT `status`=\'pending\' ');
    $q->execute();
    return $q->fetchAll();
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
