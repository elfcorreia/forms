<?php

namespace Forms\Widgets;

/**
 * @brief A checkbox html input
 */
class CheckboxInputWidget extends InputWidget {
    
    public function __construct() {
        parent::__construct('checkbox');
    }
    
    public function getHtml(array $attributes = []): string {
        $s = '<input type="checkbox" name="'.$this->getName().'"';
        foreach ($attributes as $k => $v) {
            $s .= ' '.$k.'="'.$v.'"';
        }        
        $s .= $this->getField()->isRequired() ? ' required ' : '';
        if ($this->getField()->getValue()) {
            $s .= ' checked';
        }
        $s .= '>';
        return $s;
    }
}