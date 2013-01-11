<?php
namespace Library\Fields;

class SelectField extends \Library\Field
{
  protected $maxLength;
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    if($this->has_controlgroup){
      $widget .= '<div class="control-group"><label class="control-label" for="'.$this->name.'">'.
            $this->label.
            '</label>'.
            '<div class="controls">';

    }
    $widget.= '<select class="'.$this->span.'" name="'.$this->name.'"><option>test'.'</option>' ;
    
    
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
      return $widget .= '</select></div></div>';
    }
    else{
      // Close the input tag
      return $widget .='</select>';
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
