<?php
namespace Library\Fields;

class PasswordField extends \Library\Field
{
  protected $maxLength;
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

    $widget.= '<input class="'.$this->span.'" type="password"'.' placeholder="'.$this->placeholder.'" name="'.$this->name.'"';


    if (!empty($this->value))
    {
      $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }

    if (!empty($this->maxLength))
    {
      $widget .= ' maxlength="'.$this->maxLength.'"';
    }

    if($this->has_controlgroup){

      // Close input tag , div.control, div.control-group
      $widget .= '/>';

      if (!empty($this->errorMessage))
      {
        $widget .= '<span class="help-inline">'.$this->errorMessage.'</span>';
      }
      $widget.='</div></div>';
      return $widget;
    }
    else{
      // Close the input tag
      return $widget .='/>';
    }

  }

  public function setMaxLength($maxLength)
  {
    $maxLength = (int) $maxLength;

    if ($maxLength > 0)
    {
      $this->maxLength = $maxLength;
    }
    else
    {
      throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
    }
  }
}
