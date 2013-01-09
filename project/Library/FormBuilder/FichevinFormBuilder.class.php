<?php
namespace Library\FormBuilder;

class FichevinFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
    $this->form->setNb_columns(2);
    $this->form->setHas_fieldsets(True);

    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'Caractéristiques',
      'columnid' =>1,
      'fieldlist'=>array(
        new \Library\Fields\StringField(array(
        'label' => 'nom',
        'name' => 'nom',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'producteur',
          'name' => 'producteur',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'alcool',
          'name' => 'alcool',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        ))
      )
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'L\'oeil',
      'columnid' => 2,
      'fieldlist'=>array(
        new \Library\Fields\StringField(array(
        'label' => 'nom',
        'name' => 'nom',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'producteur',
          'name' => 'producteur',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'alcool',
          'name' => 'alcool',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        ))
      )
    )));
    
   

  }
}
