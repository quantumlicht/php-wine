<?php
namespace Library\FormBuilder;

class InscriptionFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
     $this->form->setHas_fieldsets(False);
    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'Formulaire d\'inscription',
      'fieldlist' =>array(new \Library\Fields\StringField(array(
        'placeholder'=>'Nom d\'utilisateur',
        'has_controlgroup'=>True,
        'label'=>'Nom d\'utilisateur',
        'name' => 'utilisateur',
        'span' => 'span4',
        'maxLength' => 25,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('<div class"alert alert-error">Le nom d\'utilisateur doit etre inferieur a 20 characteres</div>', 20),
          new \Library\Validators\NotNullValidator('Merci de spécifier le nom d\'utilisateur')
          )
        )),
        new \Library\Fields\StringField(array(
          'placeholder'=>'Adresse courriel',
          'has_controlgroup'=>True,
          'label'=>'Courriel',
          'name' => 'courriel',
          'span' => 'span4',
          'maxLength' => 48,
          'validators' => array(
            new \Library\Validators\MaxLengthValidator('L\'adresse Courriel doit etre inferieur a 48 caractères', 48),
            new \Library\Validators\NotNullValidator('Merci de spécifier le courriel'),
            new \Library\Validators\ValidEmailValidator('Cette Adresse email n\'est pas valide.'),
          )
        )),
        new \Library\Fields\PasswordField(array(
          'placeholder'=>'Mot de Passe',
          'has_controlgroup'=>True,
          'label'=>'Mot de Passe',
          'name' => 'motdepasse',
          'span' => 'span4',
          'maxLength' => 48,
          'validators' => array(
            new \Library\Validators\MaxLengthValidator('Le mot de passe doit etre inferieur a 48 caractères', 48),
            new \Library\Validators\NotNullValidator('Merci de spécifier le mot de passe'),
          )
        )),
        new \Library\Fields\PasswordField(array(
          'placeholder'=>'Resaisir le mot de passe',
          'has_controlgroup'=>True,
          'label'=>'Resaisir le mot de passe',
          'name' => 'motdepasse',
          'span' => 'span4',
          'maxLength' => 48,
          'validators' => array(
            new \Library\Validators\MaxLengthValidator('Le mot de passe doit etre inferieur a 48 caractères', 48),
            new \Library\Validators\NotNullValidator('Merci de spécifier le mot de passe'),
          )
        ))
      )
    )
  ));
  }
}
