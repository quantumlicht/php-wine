<?php
namespace Library\Fields;

class TextField extends \Library\Field
{
  protected $cols;
  protected $rows;
  
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
    $widget.= '<textarea class="'.$this->span.' name="'.$this->name.'"';
    
    
    
    
    if (!empty($this->rows))
    {
      $widget .= ' rows="'.$this->rows.'"';
    }
    
    $widget .= '>';

    if (!empty($this->value))
    {
      $widget .= htmlspecialchars($this->value);
    }
    
   if($this->has_controlgroup){
      // Close input tag , div.control, div.control-group
      return $widget .= '</textarea></div></div>';
    }
    else{
      // Close the input tag
      return $widget .='</textarea>';
    }
  }
  
  public function setCols($cols)
  {
    $cols = (int) $cols;
    
    if ($cols > 0)
    {
      $this->cols = $cols;
    }
  }
  
  public function setRows($rows)
  {
    $rows = (int) $rows;
    
    if ($rows > 0)
    {
      $this->rows = $rows;
    }
  }
}
