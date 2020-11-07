<?php

namespace Forms\Widgets;

/** 
 * @brief A html textarea widget
 */
class TextAreaWidget extends Widget {
      
    public function getHtml(array $attributes = []): string {
        if (!isset($attributes['rows'])) {
            $attributes['rows'] = 3;
        }
        $s = '<textarea name="'.$this->getName().'"';
        foreach ($attributes as $k => $v) {
            $s .= ' '.$k.'="'.$v.'"';
        }        
        $s .= $this->getField()->isRequired() ? ' required ' : '';
        $s .= '>'.$this->getField()->getValue().'</textarea>';
        return $s;
    }
}