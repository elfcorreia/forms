<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * An URL field
 */
class URLField extends CharField {
    
    //todo add options for schema, host, path and query
    public function __construct($opts) {
        parent::__construct($opts);
    }
    
    public function validate(): void {
        parent::validate();
        if ($this->hasChanged() && !filter_var($this->getValue(), FILTER_VALIDATE_URL)) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
}