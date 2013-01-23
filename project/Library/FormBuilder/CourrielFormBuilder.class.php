<?php
namespace Library\FormBuilder;

class CourrielFormBuilder extends \Library\FormBuilder
{
  public function build()
  {
    $this->form->setNb_columns(0);
    $this->form->setHas_fieldsets(True);
    $this->form->addFieldset(new \Library\Entities\Fieldset(array(
      'name' =>'Contactez-nous',
      'fieldlist' => array(
        new \Library\Fields\StringField(array(
        'label' => 'Courriel',
        'name' => 'courriel',
        'has_controlgroup'=>True,
        'span' => 'span3',
        'validators' => array(
          new \Library\Validators\ValidEmailValidator('Courriel invalide.'),
          new \Library\Validators\NotNullValidator('Merci de spécifier votre courriel')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Sujet',
          'name' => 'sujet',
          'has_controlgroup'=>True,
          'span' => 'span3',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre sujet')
          )
        )),
        new \Library\Fields\TextField(array(
          'label' => 'Contenu',
          'name' => 'contenu',
          'has_controlgroup'=>True,
          'rows'=>10,
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
