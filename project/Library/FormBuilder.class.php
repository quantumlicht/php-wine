<?php
namespace Library;

abstract class FormBuilder
{
  protected $form;
  
  public function __construct(Entity $entity)
  {
    $this->setForm(new Form($entity));
  }
  

  // In the implemented method :
  // set nb_columns to 0 if no columns are needed, else put the number you want
  // set has_fieldsets if you want to show fieldsets, and then define the name that will show with fieldlist
  // set into which fieldset the field will be assigned by setting its fieldsetId.
  abstract public function build();
  
  public function setForm(Form $form)
  {
    $this->form = $form;
  }
  
  public function form()
  {
    return $this->form;
  }
}
