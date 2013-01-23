<?php
namespace Library\Fields;

class SelectField extends \Library\Field
{
  protected $fieldcontent=array();

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

    $widget.= '<select class="'.$this->span.'" name="'.$this->name.'"><option></option>' ;

    if(!empty($this->fieldcontent)){
      foreach ($this->fieldcontent as $content) {
        $widget.='<option>'.$content.'</option>';
      }
    }

    if (!empty($this->value))
    {
      $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }


    if($this->has_controlgroup){
      // Close input tag , div.control, div.control-group
      $widget .= '</select>';
      if (!empty($this->errorMessage))
      {
        $widget .= '<span class="help-inline">'.$this->errorMessage.'</span>';
      }
      $widget.='</div></div>';
      return $widget;
    }
    else{
      // Close the input tag
      return $widget .='</select>';
    }

  }

  public function setFieldcontent($fieldcontent){
    $this->fieldcontent = $fieldcontent;
  }

}
