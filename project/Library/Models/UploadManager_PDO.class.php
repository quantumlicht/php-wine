<?php
namespace Library\Models;

use \Library\Entities\Upload;

class UploadManager_PDO extends UploadManager
{

  protected function addFile(Upload $upload)
  {
    $requete = $this->dao->prepare('INSERT INTO uploads SET fullname=:fullname, name = :name, extension = :extension, utilisateurId = :utilisateurId, ficheId = :ficheId, size=:size');

    $requete->bindValue(':fullname', $upload->fullname());
    $requete->bindValue(':name', $upload->name());
    $requete->bindValue(':extension', $upload->extension());
    $requete->bindValue(':ficheId', $upload->ficheId());
    $requete->bindValue(':size', $upload->size());
    $requete->bindValue(':utilisateurId', $upload->utilisateurId());

    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM upload')->fetchColumn();
  }

  public function fileExists($filename){
    $q = $this->dao->prepare('SELECT * FROM uploads WHERE fullname = :fullname');
    $q->bindValue(':fullname',$filename);
    $q->execute();
    return count($q->fetchAll());
  }


  public function delete($id)
  {
    $this->dao->exec('DELETE FROM uploads WHERE id = '.(int) $id);
  }


   protected function modify(upload $upload)
  {
    $requete = $this->dao->prepare('UPDATE upload SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');

    $requete->bindValue(':titre', $upload->titre());
    $requete->bindValue(':auteur', $upload->auteur());
    $requete->bindValue(':contenu', $upload->contenu());
    $requete->bindValue(':id', $upload->id(), \PDO::PARAM_INT);

    $requete->execute();
  }


  public function get($name)
  {
    $q = $this->dao->prepare('SELECT fullname FROM uploads WHERE name = :name');
    $q->bindValue(':name',$name);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Upload');

    return $q->fetch();
  }

}
