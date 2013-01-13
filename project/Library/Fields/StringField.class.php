<?php
namespace Library\Fields;

class StringField extends \Library\Field
{
  protected $maxLength;
  protected $typeahead;

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
    if($this->typeahead){
      $widget.= '<input class="'.$this->span.'" autocomplete="off" type="text"'.' placeholder="'.$this->placeholder.'" name="'.$this->name.'" data-provide="type-ahead"';
    }
    else{
      $widget.= '<input class="'.$this->span.'" type="text"'.' placeholder="'.$this->placeholder.'" name="'.$this->name.'"';
    }

    
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
      return $widget .= '/></div></div>';
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

  public function setTypeahead($typeahead)
  {
    if(is_bool($typeahead))
    {
      $this->typeahead = $typeahead;
    }
  }
}
