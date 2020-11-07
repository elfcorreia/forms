<?php

namespace Forms\Widgets;

/**
 * @brief Base class for HTML input widgets
 */
class InputWidget extends Widget {
    
    private $type = null;
    
    public function __construct($type) {
        $this->type = $type;
    }
    
    public function getType() { return $this->type; }
    
    public function getHtml(array $attributes = []): string {
        $s = '<input name="'.$this->getName().'" type="'.$this->getType().'"';        
        foreach ($attributes as $k => $v) {
            $s .= ' '.$k.'="'.$v.'"';
        }
        $s .= $this->getField()->isRequired() ? ' required ' : '';
        $s .= ' value="'.$this->getField()->getValue().'">';
        return $s;
    }
}