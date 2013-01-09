<?php
namespace Library\Entities;

class Fieldset extends \Library\Entity
{
  /**
   *  Contient les Field que l'on desire inclure dans le fieldset
   */
  protected $fieldlist,
            $name,
            $columnid;
  
  public function __construct(array $options = array())
  {
    if (!empty($options))
    {
      $this->hydrate($options);
    }
  }

  // SETTERS //
 

  public function setColumnid($columnid)
  {
    if (!empty($columnid))
    {
      $this->columnid = $columnid;
    }
  }  

  public function setFieldlist($fieldlist)
  {
    if (!empty($fieldlist))
    {
      $this->fieldlist = $fieldlist;
    }
  }

  public function setName($name)
  {
    if (!empty($name))
    {
      $this->name = $name;
    }
  }
    
  // GETTERS //
  public function columnid()
  {
    return $this->columnid;
  }

  public function fieldlist()
  {
    return $this->fieldlist;
  }

  public function name()
  {
    return $this->name;
  }
  
}
