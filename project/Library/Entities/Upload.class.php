<?php
namespace Library\Entities;

class Upload extends \Library\Entity
{
   protected $size,
             $fullname,
             $name,
             $extension,
             $ficheId=0,
             $utilisateurId=0;


  // SETTERS
   public function setFullname($fullname)
   {
      $this->fullname = $fullname;
   }

   public function setFicheid($ficheId)
   {
      $this->ficheId = (int) $ficheId;
   }

   public function setUtilisateurId($utilisateurId)
   {
      $this->utilisateurId = (int) $utilisateurId;
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

   public function ficheId()
   {
   return $this->ficheId;
   }

   public function utilisateurId()
   {
   return $this->utilisateurId;
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
