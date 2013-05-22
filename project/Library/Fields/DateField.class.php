<?php
namespace Library\Fields;

class DateField extends \Library\Field
{
  // Note that this field will depend on javascript to concatenate the 3 sections of the date and put it into a read-only field that we can use to pass to the SQL query.
  public function buildWidget()
  {

    $widget = '';


    if($this->has_controlgroup){
      $widget .= '<div class="control-group';

      if (!empty($this->errorMessage))
      {
        $widget .= ' error';
      }
      $widget.='"><label class="control-label" for="'.$this->name.'">'.
            $this->label.
            '</label>'.
            '<div class="controls">';
    }

    $jour = range(1,31,-1);
    $mois = array(1=>'janvier',2=>'février',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'août',9=>'septembre',10=>'octobre',11=>'novembre',12=>'décembre');
    $annee = range(date("Y"),1950,-1);

    $jour_select='<option></option>';
    $mois_select='<option></option>';
    $annee_select='<option></option>';

    foreach($jour as $key=>$value){
      $jour_select.='<option value="'.$key.'">'.$value.'</option>';
    }

    foreach($mois as $key=>$value){
      $mois_select.='<option value="'.$key.'">'.$value.'</option>';
    }

    foreach($annee as $key=>$value){
      $annee_select.='<option value="'.$key.'">'.$value.'</option>';
    }


    $widget.= '<select id="date_jour" class="span2">'.$jour_select.'</select>';
    $widget.= '<select id="date_mois" class="span3">'.$mois_select.'</select>';
    $widget.= '<select id="date_annee" class="span2">'.$annee_select.'</select>';
    $widget.= '<input  name="date" type="hidden" readonly="readonly"/>';

    // if (!empty($this->value))
    // {
    //   $widget .= ' value="'.htmlspecialchars($this->value).'"';
    // }

    if (!empty($this->maxLength))
    {
      $widget .= ' maxlength="'.$this->maxLength.'"';
    }

    if($this->has_controlgroup){
      // Close input tag , div.control, div.control-group
      if (!empty($this->errorMessage))
      {
        $widget .= '<span class="help-inline">'.$this->errorMessage.'</span>';
      }
      return $widget .= '</div></div>';
    }
    else{
      // Close the input tag
      return $widget .='/>';
    }

  }

}
