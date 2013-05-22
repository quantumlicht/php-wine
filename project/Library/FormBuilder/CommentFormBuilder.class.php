<?php
namespace Library\FormBuilder;

class CommentFormBuilder extends \Library\FormBuilder
{
  public function build($title="Ajout d'un commentaire")
  {
    $this->form->setNb_columns(0);
    $this->form->setHas_fieldsets(True);
    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name' =>$title,
      'fieldlist' => array(
        // new \Library\Fields\StringField(array(
        // 'label' => 'Auteur',
        // 'name' => 'auteur',
        // 'value'=>$this->form->entity()->auteur(),
        // 'has_controlgroup'=>True,
        // 'span' => 'span3',
        // 'maxLength' => 20,
        // 'validators' => array(
        //   new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (30 caractères maximum)', 30),
        //   new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
        //   )
        // )),
        new \Library\Fields\TextField(array(
          'label' => '',
          'name' => 'contenu',
          'value'=> $this->form->entity()->contenu(),
          'has_controlgroup'=>True,
          'rows' => 7,
          'span' => 'span3',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        ))
      )
    )
  ));
  }
}
