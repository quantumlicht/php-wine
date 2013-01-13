<?php
namespace Library\Models;

use \Library\Entities\Fichevin;

abstract class VinsManager extends \Library\Manager
{

  /**
   * Méthode permettant d'ajouter une inscription.
   * @param $inscription L'inscription à ajouter
   * @return void
   */
  abstract protected function add(Fichevin $fichevin);
  
  abstract protected function getAcidite();
  abstract protected function getArome();
  abstract protected function getPays();
  abstract protected function getEncepagement($couleur);
  abstract protected function getSaveur();
  abstract protected function getTeinte($couleur);
  abstract protected function getTanin($couleur);
  abstract protected function getTags();

  /**
   * Méthode permettant de modifier une fichevin.
   * @param $fichevin la fiche à modifier
   * @return void
   */
   
  abstract protected function modify(Fichevin $fichevin);
  

  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $fichevin L'fichevin à enregistrer
   * @return void
   */
  public function save(Fichevin $fichevin)
  {
    if ($fichevin->isValid())
    {
      $fichevin->isNew() ? $this->add($fichevin) : $this->modify($fichevin);
    }
    else
    {
      throw new \RuntimeException('L\'fichevin doit être validé pour être enregistré');
    }
  }

  
}
