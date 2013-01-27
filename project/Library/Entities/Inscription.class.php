<?php
namespace Library\Entities;

class Inscription extends \Library\Entity
{
  protected $utilisateur,
            $motdepasse,
            $motdepasse_retype,
            $courriel;


  const UTILISATEUR_INVALIDE = 1;
  const MOTDEPASSE_INVALIDE = 2;
  const COURRIEL_INVALIDE = 3;


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

  public function setMotdepasse_retype($motdepasse_retype)
  {
    if (is_string($motdepasse_retype) && !empty($motdepasse_retype))
    {
      $this->motdepasse_retype = $motdepasse_retype;

    }
  }

  public function setCourriel($courriel)
  {
    if (!is_string($courriel) || empty($courriel))
    {
      $this->erreurs[] = self::COURRIEL_INVALIDE;
    }
    else
    {
      $this->courriel = $courriel;
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

  public function motdepasse_retype()
  {
    return $this->motdepasse_retype;
  }

  public function courriel()
  {
    return $this->courriel;
  }

}
