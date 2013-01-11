<?php
namespace Library\Validators;

class ValidUsernameValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return !preg_match('/[\s]/', $value);
  }
}
