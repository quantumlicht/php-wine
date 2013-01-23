<?php
namespace Library\Entities;

class Courriel extends \Library\Entity
{
  protected $courriel,
            $sujet,
            $message;


  // SETTERS //

  public function setCourriel($courriel)
  {
    if (!empty($courriel))
    {
      $this->courriel = $courriel;
    }
  }

  public function setSujet($sujet)
  {
    if (!empty($sujet))
    {
      $this->sujet = $sujet;
    }
  }

  public function setMessage($message)
  {
      $this->message = $message;
  }


  // GETTERS //

  public function courriel()
  {
    return $this->courriel;
  }

  public function sujet()
  {
    return $this->sujet;
  }

  public function message()
  {
    return $this->message;
  }

}
