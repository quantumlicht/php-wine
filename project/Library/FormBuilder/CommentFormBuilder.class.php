<?php
namespace Library\FormBuilder;

class CommentFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
    $this->form->add(new \Library\StringField(array(
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
        'validators' => array(
          new \Library\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
        ),
       )))
       ->add(new \Library\TextField(array(
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 7,
        'cols' => 50,
        'validators' => array(
          new \Library\NotNullValidator('Merci de spécifier votre commentaire'),
        ),
       )));
  }
}
