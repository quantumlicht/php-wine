<?php
namespace Library\Entities;

class Login extends \Library\Entity
{
  protected $utilisateur,
            $motdepasse;
  
  
  const UTILISATEUR_INVALIDE = 1;
  const MOTDEPASE_INVALIDE = 2;
  
  // SETTERS //

  public function setUtilisateur($utilisateur)
  {
    if (!is_string($utilisateur) || empty($utilisateur))
    {
      $this->erreurs[] = self::UTILISATEUR_INVALIDE;
    }
    else
    {
      $this->utilisateur = $utilisateur;
    }
  }
  
  public function setMotdepasse($motdepasse)
  {
    if (!is_string($motdepasse) || empty($motdepasse))
    {
      $this->erreurs[] = self::MOTDEPASSE_INVALIDE;
    }
    else
    {
      $this->motdepasse = $motdepasse;
    }
  }
  
  
  // GETTERS //
  
  public function utilisateur()
  {
    return $this->utilisateur;
  }
  
  public function motdepasse()
  {
    return $this->motdepasse;
  }
  
}
