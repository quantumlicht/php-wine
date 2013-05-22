<?php
namespace Library\Entities;

class Comment extends \Library\Entity
{
  protected $source,
            $auteur,
            $contenu,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;



  // SETTERS

  public function setSource($source)
  {
    $this->source = (int) $source;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
    else
    {
      $this->auteur = $auteur;
    }
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
    else
    {
      $this->contenu = $contenu;
    }
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  // GETTERS

  public function source()
  {
    return $this->source;
  }

  public function auteur()
  {
    return $this->auteur;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function date()
  {
    return $this->date;
  }
}
