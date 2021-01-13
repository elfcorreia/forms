<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * @brief A Boolean field
 *
 * if required the value must be true
 */
class BooleanField extends Field {
    
    public function __construct() {
        $this->setRequired(false);
    }
    
    public function getDefaultWidget(): Widget {
        return new CheckboxInputWidget();
    }
    
    public function validate(): void {
        $ok = filter_var($this->getValue(), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if ($ok === null) {
            $this->addError('invalid');
        }
        if ($this->isRequired() && $ok === false) {
            $this->addError('required');
        }
    }
    
    public function clean($v) {
        return filter_var($this->getValue(), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}