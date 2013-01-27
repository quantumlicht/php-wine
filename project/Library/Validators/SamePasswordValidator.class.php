<?php
namespace Library\Validators;

class SamePasswordValidator extends \Library\Validator
{
   protected $hash_password,
             $hash_password_retype;

   public function __construct($errorMessage, $hash_password, $hash_password_retype)
   {
      parent::__construct($errorMessage);

      $this->setHash_password($hash_password);
      $this->setHash_password_retype($hash_password_retype);
   }

   public function isValid($value)
   {
      return $this->hash_password === $this->hash_password_retype;
   }

   public function setHash_password($hash_password)
   {
      if(!empty($hash_password))
      {
         $this->hash_password = $hash_password;
      }
      // else
      // {
      //    throw new \RuntimeException('Le mot de passe ne peut être vide.');
      // }
   }

   public function setHash_password_retype($hash_password_retype)
   {
      if(!empty($hash_password_retype))
      {
         $this->hash_password_retype = $hash_password_retype;
      }
      // else
      // {
      //    throw new \RuntimeException('Le mot de passe ne peut être vide.');
      // }
   }
}
