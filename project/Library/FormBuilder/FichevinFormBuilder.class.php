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
          'span' => 'span3',
          'fieldcontent'=> range(1950,date("Y")),
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
          'typeahead' => True,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Encépagement',
          'name' => 'encepagement',
          'typeahead' => True,
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
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire'),
            new \Library\Validators\NotNullValidator('Le prix doit être une valeur numérique')
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
        'span' => 'span4',
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
        'span'=> 'span2',
        'fieldcontent'=> range(1,5),
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Arôme',
          'name' => 'arome',
          'span' => 'span4',
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
        'span'=> 'span2',
        'fieldcontent'=> range(1,5),
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'auteur du commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Persitance',
          'name' => 'persistance',
          'span'=> 'span2',
          'fieldcontent'=> range(1,5),
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Saveur',
          'name' => 'saveur',
          'span' => 'span4',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Acidité',
          'name' => 'acidite',
          'span' => 'span4',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier votre commentaire')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Tanins',
          'name' => 'tanin',
          'span' => 'span4',
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
