<?php
namespace Library\Validators;

class FormatValidator extends \Library\Validator
{
  protected $validFormat;

  public function __construct($errorMessage, $validFormat)
  {
    parent::__construct($errorMessage);

    $this->setValidFormat($validFormat);
  }

  public function isValid($value)
  {
    $value = explode(".", $value);
    $extension=end($value);

    return in_array($extension, $this->validFormat);
  }

  public function setValidFormat($validFormat)
  {
    if (!empty($validFormat))
    {
      $this->validFormat = $validFormat;
    }
  }
}
