<?php
namespace Library\Models;

use \Library\Entities\Inscription;

abstract class InscriptionsManager extends \Library\Manager
{

  /**
   * Méthode permettant d'ajouter une inscription.
   * @param $inscription L'inscription à ajouter
   * @return void
   */
  abstract protected function add(Inscription $inscription);
  
  /**
   * Méthode permettant de savoir si l'utilisateur a entre les bonnes infos pour se connecter.
   * @param $id L'identifiant du commentaire
   * @return Comment
   */
  abstract public function isAuthenticated(Inscription $inscription);


  /**
   * Méthode permettant de modifier une inscription.
   * @param $comment Le commentaire à modifier
   * @return void
   */
  abstract protected function modify(Inscription $inscription);


  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $inscription L'inscription à enregistrer
   * @return void
   */
  public function save(Inscription $inscription)
  {
    if ($inscription->isValid())
    {
      $inscription->isNew() ? $this->add($inscription) : $this->modify($inscription);
    }
    else
    {
      throw new \RuntimeException('L\'inscription doit être validé pour être enregistré');
    }
  }

  
}
