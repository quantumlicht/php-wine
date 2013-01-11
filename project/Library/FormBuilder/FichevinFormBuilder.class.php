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
          'label' => 'Producteur',
          'name' => 'producteur',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Année',
          'name' => 'annee',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Type (Appelation)',
          'name' => 'appelation',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Pays',
          'name' => 'pays',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Région',
          'name' => 'region',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Encépagement',
          'name' => 'encepagement',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Alcool',
          'name' => 'alcool',
          'span' => 'span3',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Date',
          'name' => 'date',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Prix',
          'name' => 'prix',
          'span' => 'span3',
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
        new \Library\Fields\SelectField(array(
        'label' => 'Teinte',
        'name' => 'teinte',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        ))
      )        
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'Le nez',
      'columnid' => 2,
      'fieldlist'=>array(
        new \Library\Fields\SelectField(array(
        'label' => 'Intensité',
        'name' => 'nez_intensite',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Arôme',
          'name' => 'arome',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\TextField(array(
          'label' => 'Impressions',
          'name' => 'nez_impression',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        ))
      )
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'La bouche',
      'columnid' => 2,
      'fieldlist'=>array(
        new \Library\Fields\SelectField(array(
        'label' => 'Intensité',
        'name' => 'bouche_intensite',
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Persitance',
          'name' => 'persistance',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Saveur',
          'name' => 'saveur',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Acidité',
          'name' => 'acidite',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Tanins',
          'name' => 'tanin',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\TextField(array(
          'label' => 'Impressions',
          'name' => 'bouche_Impression',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        ))
      )
    )));
    
  }
}
