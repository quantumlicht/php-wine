<?php
namespace Library;

class Form
{
   protected $entity;
   protected $fields = array();
   protected $fieldsets = array();
   protected $nb_columns; // Decide how many columns appear in the form
   protected $has_fieldsets;

   public function __construct(Entity $entity)
   {
      $this->setEntity($entity);
   }

   public function addFieldset($fieldset)
   {
      $this->fieldsets[] = $fieldset; // On ajoute le champ passé en argument à la liste des champs.
      foreach ($fieldset->fieldlist(0) as $field ) {
         $this->fields[] = $field;
      }
      return $this;
   }

   public function createView()
   {

      $view = '';
      // Building list of all fields
      // foreach ($this->fieldsets as $fieldset)
      // {
      //    foreach($fieldset->fieldlist() as $field)
      //    {
      //       $this->fields[] = $field;
      //    }
      // }

      if(!$this->nb_columns)
      {
         // no fieldsets, no columns Ex: comments
         if(!$this->has_fieldsets)
         {
            foreach ($this->fields as $field)
            {
               $view .= $field->buildWidget();
            }
         }
         // no columns with fieldsets Ex: Inscription
         else
         {
            foreach($this->fieldsets as $fieldset)
            {
               $view .= '<fieldset><legend>'. $fieldset->name().'</legend>';
               foreach ($fieldset->fieldlist() as $field) {
                  $view .= $field->buildWidget();
               }
            }
            $view.='</fieldset>';
         }
      }
      else
      {
         //===================Prepare columns==========================
         $columnsContent = array();
         $length =  12 / $this->nb_columns;
         $spanclass = 'span'. (string)$length;

         for($i=0; $i<$this->nb_columns;$i++)
         {
            array_push($columnsContent,'<div class="'.$spanclass.'">');
         }

         //  columns + fieldsets Ex: Fichevins
         if($this->has_fieldsets)
         // Populate columns with fieldsets
         {

            // Populate columns with fieldsets
            foreach ($this->fieldsets as $fieldset)
            {
               $columnsContent[$fieldset->columnid()-1] .= '<fieldset><legend>'.$fieldset->name().'</legend>';

               foreach ($fieldset->fieldlist() as $field)
               {
                  $columnsContent[($fieldset->columnid())-1] .= $field->buildWidget();
               }
            }
            $columnsContent[($fieldset->columnid())-1] .= '</fieldset>'; // Close brackets
         }
         // columns, but no fieldsets Ex: No example now.
         else
         // Populate columns with field objects instead
         {
            foreach ($this->fieldsets as $fieldset)
            {
               foreach($fieldset->fieldlist() as $field)
               {
                  $columnsContent[$fieldset->columnid()-1].= $field->buildWidget();
               }
            }
         }

         foreach ($columnsContent as $columnContent) // Close the columns bracket.
         {
            $columnContent .= '</div>';
            $view.=$columnContent;
         }
      }
      return $view;
   }

   public function isValid()
   {
      $valid = true;
      $nb_invalid=0;
      // On vérifie que tous les champs sont valides.
      foreach ($this->fields as $field)
      {
         if (!$field->isValid())
         {
            $nb_invalid++;
            $valid = false;
         }
      }
      // echo $nb_invalid;
      return $valid;
   }

   public function entity()
   {
      return $this->entity;
   }

   public function fieldsets()
   {
      return $this->fieldSets;
   }

   public function has_fieldsets()
   {
      return $this->has_fieldsets;
   }

   public function nb_columns()
   {
      return $this->fieldSets;
   }

   public function setEntity(Entity $entity)
   {
      $this->entity = $entity;
   }

   public function setFieldsets($fieldsets)
   {
      $this->fieldsets = $fieldsets;
   }

   public function setNb_columns($nb_columns)
   {
      if(is_numeric($nb_columns)){
         $this->nb_columns = $nb_columns;
      }
   }

   public function setHas_fieldsets($has_fieldsets)
   {
      if(is_bool($has_fieldsets)){
         $this->has_fieldsets = $has_fieldsets;
      }
   }

}
