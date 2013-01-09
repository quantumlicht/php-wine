<?php
namespace Library\FormBuilder;

class NewsFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
    $this->form->setNb_columns(0);
    $this->form->setHas_fieldsets(False);
    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'Ajout d\'une News',
      'fieldlist' => array(new \Library\Fields\StringField(array(
        'label' => 'Auteur',
        'value'=>$this->form->entity()->auteur(),
        'has_controlgroup'=>True,
        'name' => 'auteur',
        'span'=>'span4',
        'maxLength' => 25,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 25),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur de la news'),
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Titre',
          'value'=>$this->form->entity()->titre(),
          'name' => 'titre',
          'span'=>'span4',
          'has_controlgroup'=>True,
          'maxLength' => 100,
          'validators' => array(
            new \Library\Validators\MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
            new \Library\Validators\NotNullValidator('Merci de spécifier le titre de la news'),
            )
          )),
        new \Library\Fields\TextField(array(
          'label' => 'Contenu',
          'value'=>$this->form->entity()->contenu(),
          'name' => 'contenu',
          'has_controlgroup'=>True,
          'rows' => 8,
          'span'=>'span4',
          'cols' => 100,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le contenu de la news'),
          )
        ))
      )
    )
  ));
  }
}
