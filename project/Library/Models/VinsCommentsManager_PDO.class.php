<?php
namespace Library\Models;

use \Library\Entities\Comment;

class VinsCommentsManager_PDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO wine_comments SET source = :source, auteur = :auteur, contenu = :contenu, date = NOW()');

    $q->bindValue(':source', $comment->source(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());

    $q->execute();

    $comment->setId($this->dao->lastInsertId());
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM wine_comments WHERE id = '.(int) $id);
  }

   public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, source, auteur, contenu FROM wine_comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Comment');

    return $q->fetch();
  }

   protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE wine_comments SET auteur = :auteur, contenu = :contenu WHERE id = :id');

    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

    $q->execute();
  }

  public function getComments($objParams)
  {
    $source = $objParams->source();
    if (!is_integer($source))
    {
      throw new \InvalidArgumentException('L\'identifiant de la source passé doit être un nombre entier valide');
    }

    $q = $this->dao->prepare('SELECT * FROM wine_comments WHERE source = :source');
    $q->bindValue(':source', $source, \PDO::PARAM_INT);
    $q->execute();
    return $q->fetchAll();

  }
}
