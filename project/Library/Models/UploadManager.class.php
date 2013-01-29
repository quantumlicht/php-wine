<?php
namespace Library\Models;

use \Library\Entities\Upload;

abstract class UploadManager extends \Library\Manager
{
  /**
   * Méthode permettant d'ajouter une upload.
   * @param $upload upload La upload à ajouter
   * @return void
   */
  public function saveFile(Upload $upload)
  {
    if ($upload->isValid())
    {
      $upload->isNew() ? $this->addFile($upload) : $this->modifyFile($upload);
    }
    else
    {
      throw new \RuntimeException('L\'fichevin doit être validé pour être enregistré');
    }
  }

  /**
   * Méthode permettant d'enregistrer une upload.
   * @param $upload upload la upload à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */

  /**
   * Méthode permettant de supprimer une upload.
   * @param $id int L'identifiant de la upload à supprimer
   * @return void
   */
  abstract public function delete($id);


  /**
   * Méthode renvoyant le nombre de upload total.
   * @return int
   */
  abstract public function count();

   /**
   * Méthode permettant de modifier une upload.
   * @param $upload upload la upload à modifier
   * @return void
   */
  abstract protected function modify(upload $upload);


  /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comment
   */
  abstract public function get($id);
}
