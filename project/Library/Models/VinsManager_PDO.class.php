<?php
namespace Library\Models;

use \Library\Entities\Fichevin;

class VinsManager_PDO extends VinsManager
{

  protected function add(Fichevin $fichevin)
  {
    $query = 'INSERT INTO fichevins SET nom=:nom, producteur=:producteur, annee =:annee, appelation=:appelation, pays=:pays, region=:region,'.
      'alcool=:alcool, date=:date, code_saq=:code_saq, prix=:prix, teinte=:teinte, nez_intensite=:nez_intensite, arome=:arome, bouche_intensite=:bouche_intensite,'.
      'persistance=:persistance, saveur=:saveur, acidite=:acidite, couleur=:couleur' ;

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


    $arrCepage=array_unique(explode(',',$fichevin->encepagement()));
    foreach ($arrCepage as $cepage)
    {
      $id = self::getId('encepagements','encepagement',$cepage) ;
      if($id)
      {
        $query='INSERT INTO encepagement_store (encepagementId,vinId) VALUES('.$id[0]['id'].','.$fichevin->id().')';
        $q=$this->dao->prepare($query);
        $q->execute();
      }
      else
      {
        // first store in list of encepagement
        $insertQuery='INSERT INTO encepagements (`id`,`encepagement`,`couleur`,`status`) VALUES (NULL,\''.$cepage.'\',\''.$fichevin->couleur().'\',\'pending\')';
        $qInsert=$this->dao->prepare($insertQuery);
        $qInsert->execute();

        $encepagementId=$this->dao->lastInsertId();
        // then add in the encepagement store
        $storeQuery='INSERT INTO encepagement_store (`encepagementId`,`vinId`) VALUES('.$encepagementId.','.$fichevin->id().')';
        $qStore=$this->dao->prepare($storeQuery);
        $qStore->execute();
      }
    }

    $arrTag=array_unique(explode(',',$fichevin->tag()));
    foreach ($arrTag as $tag)
    {
      $id = self::getId('tags','tag',$tag);
      if($id)
      {
        $query='INSERT INTO tag_store (`tagId`,`vinId`) VALUES('.$id[0]['id'].','.$fichevin->id().')';
        $q=$this->dao->prepare($query);
        $q->execute();
      }
      else
      {
        // first store in list of tag
        $insertQuery='INSERT INTO tags (`id`,`tag`,`status`) VALUES (NULL,\''.$tag.'\',\'pending\')';
        $qInsert=$this->dao->prepare($insertQuery);
        $qInsert->execute();

        $tagId=$this->dao->lastInsertId();
        // then add in the tag store
        $storeQuery='INSERT INTO tag_store (`tagId`,`vinId`) VALUES('.$tagId.','.$fichevin->id().')';
        $qStore=$this->dao->prepare($storeQuery);
        $qStore->execute();
      }
    }

  }

  public function wineExists(Fichevin $fichevin){
    $q = $this->dao->prepare('SELECT * FROM fichevins WHERE nom = :nom');
    $q->bindValue(':nom',$fichevin->nom());
    $q->execute();
    return count($q->fetchAll());
  }

  public function codeSaqExists(Fichevin $fichevin){
    $q = $this->dao->prepare('SELECT * FROM fichevins WHERE code_saq = :code_saq');
    $q->bindValue(':code_saq',$fichevin->code_saq());
    $q->execute();
    return count($q->fetchAll());
  }

  private function getId($table,$column,$value)
  {
    $q = $this->dao->prepare('SELECT id FROM '. $table.' WHERE '.$column.'="'.$value.'"');
    $q->execute();
    return $q->fetchAll();
  }

  public function getRow($table,$id)
  {
    $q = $this->dao->prepare('SELECT * FROM '. $table.' WHERE id = :id');
    $q->bindValue(':id',$id);
    $q->execute();
    return $q->fetchAll();
  }

  public function getFullRow($id)
  {
    // Make sure that we've cleaned up the db entries that won't that are not properly linked with the id as a foreign key.
    $q = $this->dao->prepare('SELECT nom,producteur,annee,appelation,region,alcool,date,code_saq,prix,nez_intensite,bouche_intensite,persistance,couleur FROM fichevins WHERE id = :id');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $fichevin=$q->fetch();

    $q = $this->dao->prepare('SELECT pays FROM pays WHERE id = (SELECT pays FROM fichevins WHERE id=:id)');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $pays=$q->fetch();

    $q = $this->dao->prepare('SELECT teinte FROM teintes WHERE id = (SELECT teinte FROM fichevins WHERE id=:id)');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $teinte=$q->fetch();

    $q = $this->dao->prepare('SELECT arome FROM aromes WHERE id = (SELECT arome FROM fichevins WHERE id=:id)');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $arome=$q->fetch();

    $q = $this->dao->prepare('SELECT encepagement FROM encepagements WHERE id IN (SELECT encepagementId FROM  encepagement_store WHERE vinId=:id)');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $encepagement=$q->fetch();

    $q = $this->dao->prepare('SELECT tag FROM tags WHERE id IN (SELECT tagId FROM  tag_store WHERE vinId=:id)');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $tag=$q->fetch();

    $q = $this->dao->prepare('SELECT fullname FROM uploads WHERE ficheId=:id');
    $q->bindValue(':id',$id);
    $q->execute();
    $q->setFetchMode(\PDO::FETCH_ASSOC);
    $upload=$q->fetch();

    $fichevin = new \Library\Entities\Fichevin(array_merge($fichevin,$encepagement,$tag,$pays,$teinte,$arome));
    $fichevin->setFichier($upload['fullname']);
    return $fichevin;
  }

  public function countPending($table)
  {
    $query = $this->dao->prepare('SELECT * FROM '.$table. ' WHERE status=\'pending\'');
    $query->execute();
    return count($query->fetchAll());
  }

  public function getPending($table)
  {
    $query = $this->dao->prepare('SELECT * FROM '.$table. ' WHERE status=\'pending\'');
    $query->execute();
    return $query->fetchAll();
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
  public function modifyRow($table,$rowId,$column,$value)
  {
    $q = $this->dao->prepare('UPDATE '. $table.' SET '.$column.' = :marker WHERE id = :id');
    $q->bindValue(':marker', $value);
    $q->bindValue(':id', $rowId, \PDO::PARAM_INT);
    echo $value.'   '.$rowId;
    var_dump($q);

    $q->execute();
  }


  public function deleteRow($table,$rowId)
  {
    $this->dao->exec('DELETE FROM '. $table.' WHERE id = '.(int) $rowId);

  }

  public function getAll()
  {
    $sql = 'SELECT * FROM fichevins';

    $q = $this->dao->query($sql);
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Fichevin');
    $listeVins = $q->fetchAll();

    $q->closeCursor();
    return $listeVins;
  }
  //========================================================================
  // PUBLIC
  public function getAcidite($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`acidite` FROM  `acidites` ORDER BY `id` ASC');
    $q->execute();
    return $q->fetchAll();
  }

  public function getArome($couleur)
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

  public function getPays($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`pays` FROM  `pays` ORDER BY `pays`');
    $q->execute();
    return $q->fetchAll();
  }

  public function getSaveur($couleur)
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

  public function getTag($couleur)
  {
    $q = $this->dao->prepare('SELECT `id`,`tag` FROM  `tags` WHERE NOT `status`=\'pending\' ');
    $q->execute();
    return $q->fetchAll();
  }


}
