<?php
namespace Library\Validators;

class ValidPasswordValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}
