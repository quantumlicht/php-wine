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
        'label' => 'Nom',
        'name' => 'nom',
        'value'=> $this->form->entity()->nom(),
        'maxLength' => 30,
        'validators' => array(
          new \Library\Validators\MaxLengthValidator('Le nom spécifié est trop long (30 caractères maximum)', 30),
          new \Library\Validators\NotNullValidator('Merci de spécifier le nom du vin.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Producteur',
          'name' => 'producteur',
          'value'=> $this->form->entity()->producteur(),
          'maxLength'=> 30,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le producteur.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Année',
          'name' => 'annee',
          'value'=> $this->form->entity()->annee(),
          'span' => 'span3',
          'fieldcontent'=> array_reverse(range(1950,date("Y"))),
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier l\'année.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Type (Appelation)',
          'name' => 'appelation',
          'value'=> $this->form->entity()->appelation(),
          'tooltip' => 'Sil ny a pas dappelation, laissez ce champ vide.',
          'validators' => array(

          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Pays',
          'name' => 'pays',
          'value'=> $this->form->entity()->pays(),
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le pays d\'origine.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Région',
          'name' => 'region',
          'value'=> $this->form->entity()->region(),
          'typeahead' => True,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier la région.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Encépagement',
          'name' =>'cepage',
          'span'=>'span6',
          'value'=>$this->form->entity()->encepagement(),
          'typeahead' => True,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le ou les cépages.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Alcool',
          'name' => 'alcool',
          'placeholder'=>'00.0',
          'value'=> $this->form->entity()->alcool(),
          'span' => 'span4',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le pourcentage d\'alcool')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Prix',
          'name' => 'prix',
          'placeholder'=>'00.00',
          'value'=> $this->form->entity()->prix(),
          'span' => 'span4',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le prix.')
          )
        )),
        new \Library\Fields\StringField(array(
          'label' => 'Code SAQ',
          'name' => 'code_saq',
          'maxLength'=>21,
          'value'=> $this->form->entity()->code_saq(),
          'span' => 'span4',
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier le code SAQ')
          )
        )),
        new \Library\Fields\DateField(array(
          'label' => 'Date de dégustation',
          'name' => 'date',
          'value'=> $this->form->entity()->date(),
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier la date de dégustation.')
          )
        ))

      )
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'Impression d\'ensemble',
      'columnId' => 1,
      'fieldlist' => array(
        new \Library\Fields\StringField(array(
              'label' => 'Mot-Clés',
              'name' =>'mot-cle',
              'span'=>'span6',
              'value'=>$this->form->entity()->tag(),
              'typeahead' => True,
              'validators' => array(

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
        'value'=> $this->form->entity()->teinte(),
        'span' => 'span4',
        'maxLength' => 20,
        'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier la teinte.')
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
        'value'=> $this->form->entity()->nez_intensite(),
        'span'=> 'span2',
        'fieldcontent'=> range(1,5),
        'maxLength' => 20,
        'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier l\'intensite du nez.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Arôme',
          'name' => 'arome',
          'value'=> $this->form->entity()->arome(),
          'span' => 'span4',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier l\'arôme primaire.')
          )
        ))
        // new \Library\Fields\TextField(array(
        //   'label' => 'Impressions',
        //   'name' => 'nez_impression',
        //   'value'=> $this->form->entity()->nez_impression(),
        //   'validators' => array(
        //   )
        // ))
      )
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => 'La bouche',
      'columnid' => 2,
      'fieldlist'=>array(
        new \Library\Fields\SelectField(array(
        'label' => 'Intensité',
        'name' => 'bouche_intensite',
        'value'=> $this->form->entity()->bouche_intensite(),
        'span'=> 'span2',
        'fieldcontent'=> range(1,5),
        'validators' => array(
          new \Library\Validators\NotNullValidator('Merci de spécifier l\'intensité de la bouche.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Persitance',
          'name' => 'persistance',
          'value'=> $this->form->entity()->persistance(),
          'span'=> 'span2',
          'fieldcontent'=> range(1,5),
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier la persistance.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Saveur',
          'name' => 'saveur',
          'value'=> $this->form->entity()->saveur(),
          'span' => 'span4',
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier la saveur.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Acidité',
          'name' => 'acidite',
          'span' => 'span4',
          'value'=> $this->form->entity()->acidite(),
          'maxLength'=> 20,
          'validators' => array(
            new \Library\Validators\NotNullValidator('Merci de spécifier l\'acidité.')
          )
        )),
        new \Library\Fields\SelectField(array(
          'label' => 'Tanins',
          'name' => 'tanin',
          'value'=> $this->form->entity()->tanin(),
          'span' => 'span4',
          'maxLength'=> 20,
          'validators' => array(

          )
        ))
        // new \Library\Fields\TextField(array(
        //   'label' => 'Impressions',
        //   'name' => 'bouche_impression',
        //   'value'=> $this->form->entity()->bouche_impression(),
        //   'validators' => array(

        //   )
        // ))
      )
    )))
    ->addFieldset(new \Library\Entities\Fieldset(array(
      'name' => "Ajoutez une photo de l'étiquette",
      'columnid' => 2,
      'fieldlist'=>array(
        new \Library\Fields\FileField(array(
        'label' => 'Fichier',
        'name' => 'fichier',
        'value'=> $this->form->entity()->fichier()['name'],
        'span' => 'span8',
        'validators' => array(
            new \Library\Validators\MaxSizeValidator('La taille du fichier doit être inférieur à 20Mb',20*1024*1024),
            new \Library\Validators\FormatValidator('Les fichiers acceptés sont : "jpg", "jpeg", "gif", "png"',array("jpg", "jpeg", "gif", "png"))
          )
        ))
      )
    )));

  }
}
