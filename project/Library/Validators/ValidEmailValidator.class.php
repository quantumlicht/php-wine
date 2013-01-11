<?php
namespace Library\Validators;

class ValidEmailValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i',$value);
  }
}
