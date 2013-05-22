<?php
namespace Library\Entities;

class AjaxRequest extends \Library\Entity
{
  protected $table,
            $couleur,
            $manager,
            $source;



  // SETTERS

  public function setTable($table)
  {
     if (is_string($table) && !empty($table))
    {
      $this->table = $table;
    }
  }

  public function setCouleur($couleur)
  {
     if (is_string($couleur) && !empty($couleur))
    {
      $this->couleur = $couleur;
    }
  }

  public function setManager($manager)
  {
    if (is_string($manager) && !empty($manager))
    {
      $this->manager = $manager;
    }
  }

  public function setSource($source)
  {
    $this->source = intval($source);
  }

  // GETTERS

  public function table()
  {
    return $this->table;
  }

  public function couleur()
  {
    return $this->couleur;
  }

  public function manager()
  {
    return $this->manager;
  }

  public function source()
  {
    return $this->source;
  }
}
