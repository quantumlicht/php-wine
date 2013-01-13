<?php
namespace Library\Validators;

class Numericvalidator extends \Library\Validator
{

  
  public function __construct($errorMessage)
  {
    parent::__construct($errorMessage);
    
  }
  
  public function isValid($value)
  {
    return is_numeric($value);
  }

}
