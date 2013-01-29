<?php
namespace Library\Fields;

class FileField extends \Library\Field
{
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

    $widget.= '<div id="uploadHiddenDiv" style="height: 0px;width: 0px; overflow:hidden;"><input class="'.$this->span.'" type="file"'.'name="'.$this->name.'"</div>';


    if (!empty($this->value))
    {
      $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }

    if($this->has_controlgroup){

      if (!empty($this->errorMessage))
      {
        $widget .= '<span class="help-inline">'.$this->errorMessage.'</span>';
      }
      $widget.='</div></div>';
      return $widget;
    }

  }

}
