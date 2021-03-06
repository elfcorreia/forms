<?php

namespace Forms\Fields;

use Forms\Field;
use Forms\Widget;
use Forms\DateTimeInputWidget;

/**
 * @brief A timestamp field
 */
class TimestampField extends AbstractEmptyField {
    
    public function __construct($opts) {
        parent::__construct($opts);
    }
    
    public function getDefaultWidget(): Widget {
        return new DateTimeInputWidget();
    }
    
    public function validate(): void {
        if ($this->getValue() === $this->getEmpty()) {
            if ($this->isRequired()) {
                $this->addError('required');
            }
        } else {
            $valid = strtotime($this->getValue());
            if ($this->hasChanged() && !$valid) {
                $this->addError('invalid');
            }
        }
    }
    
    public function clean($value) {
        return $this->getValue() === $this->getEmpty() ? $this->getEmptyValue() : strtotime($value);
    }
    
}