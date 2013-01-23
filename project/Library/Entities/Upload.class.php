<?php
namespace Library\Entities;

class Upload extends \Library\Entity
{
   protected $size,
             $fullname,
             $name,
             $extension,
             $ficheid=0;


  // SETTERS
   public function setFullname($fullname)
   {
      $this->fullname = $fullname;
   }

   public function setFicheid($ficheid)
   {
      $this->ficheid = (int) $ficheid;
   }


   public function setSize($size)
   {
      $this->size = (int) $size;
   }

   public function setName($name)
   {
      $this->name = $name;
   }

   public function setExtension($extension)
   {
      $this->extension = $extension;
   }

   // GETTERS

   public function extension()
   {
   return $this->extension;
   }

   public function ficheid()
   {
   return $this->ficheid;
   }

   public function fullname()
   {
   return $this->fullname;
   }

   public function size()
   {
   return $this->size;
   }

   public function name()
   {
   return $this->name;
   }

}
