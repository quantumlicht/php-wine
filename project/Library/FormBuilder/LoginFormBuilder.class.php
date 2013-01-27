<?php
namespace Library\FormBuilder;

class LoginFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
    $this->form->setNb_columns(0);
    $this->form->setHas_fieldsets(False);

    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name'=>'Login',
      'fieldlist'=>array(
        new \Library\Fields\StringField(array(
        'has_controlgroup'=>False,
        'placeholder'=>'Nom d\'utilisateur',
        'name' => 'utilisateur',
        'span' => 'span4',
        'maxLength' => 20,
        'validators' => array(

          )
        )),
        new \Library\Fields\PasswordField(array(
          'has_controlgroup'=>False,
          'placeholder'=>'Mot de Passe',
          'name' => 'motdepasse',
          'span' => 'span4',
          'maxLength' => 48,
          'validators' => array(

          )
        ))
      )
  )));
  }
}
