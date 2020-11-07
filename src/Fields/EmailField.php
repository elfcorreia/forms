<?php

namespace Forms\Fields;

/**
 * @ An email field
 */
class EmailField extends CharField {
    
    public function getDefaultWidget(): Widget {
        return new TextInputWidget("email");
    }
    
    public function validate(): void {
        parent::validate();
        $v = $this->clean($this->getValue());
        if ($v !== null && !$v) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        if ($value != null) {            
            return filter_var($this->isStrip() ? trim($value) : $value,
                FILTER_SANITIZE_EMAIL
            );
        }
        return null;
    }
}