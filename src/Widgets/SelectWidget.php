<?php

namespace Forms\Widgets;

/** 
 * @brief A html select widget
 */
class SelectWidget extends Widget {
    
    public function getHtml(array $attributes = []): string {
        $s = '<select name="'.$this->getName().'"';
        foreach ($attributes as $k => $v) {
            $s .= ' '.$k.'="'.$v.'"';
        }
        $s .= $this->getField()->isRequired() ? ' required ' : '';
        $s .= $this->getField()->isDisabled() ? ' disabled ' : '';
        $s .= ">\n";
        $fv = $this->getField()->getValue();
        foreach ($this->getField()->getChoices() as $k => $v) {
            $s .= '<option value="'.$k.'"';
            if ($k == $fv) {
                $s .= ' selected';
            }
            $s .= '>'.$v."</option>\n";
        }
        $s .= "</select>\n";
        return $s;
    }
}