<?php
namespace Library\Models;

use \Library\Entities\Inscription;

class InscriptionsManager_PDO extends InscriptionsManager
{

  protected function add(Inscription $inscription)
  {
    $q = $this->dao->prepare('INSERT INTO inscriptions SET utilisateur = :utilisateur, courriel = :courriel, motdepasse = :motdepasse, dateAjout = NOW()');

    $q->bindValue(':utilisateur', $inscription->utilisateur(), \PDO::PARAM_INT);
    $q->bindValue(':courriel', $inscription->courriel());
    $q->bindValue(':motdepasse', sha1($inscription->motdepasse()));

    $q->execute();

    $inscription->setId($this->dao->lastInsertId());
  }

  public function isAuthenticated(Inscription $inscription )
  {
    $q = $this->dao->prepare('SELECT id FROM inscriptions WHERE utilisateur= :utilisateur AND motdepasse= :motdepasse');

    $q->bindValue(':utilisateur',$inscription->utilisateur());
    $q->bindValue(':motdepasse',$inscription->motdepasse());

    $q->execute();

    return $q->fetch();
  }

  protected function modify(Inscription $inscription)
  {
    $q = $this->dao->prepare('UPDATE inscriptions SET utilisateur = :utilisateur, courriel = :courriel, motdepasse = :motdepasse, dateAjout = NOW() WHERE id = :id');

    $q->bindValue(':utilisateur', $comment->utilisateur());
    $q->bindValue(':courriel', $comment->utilisateur());
    $q->bindValue(':motdepasse', sha1($comment->motdepasse()));
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

    $q->execute();
  }

  public function userExists(Inscription $inscription)
  {
    $q = $this->dao->prepare('SELECT * FROM inscriptions WHERE utilisateur= :utilisateur ');
    $q->bindValue(':utilisateur',$inscription->utilisateur());

    $q->execute();
    return count($q->fetchAll());
  }

  public function emailTaken(Inscription $inscription)
  {
    $q = $this->dao->prepare('SELECT * FROM inscriptions WHERE courriel= :courriel ');
    $q->bindValue(':courriel',$inscription->courriel());

    $q->execute();
    return count($q->fetchAll());
  }
}
