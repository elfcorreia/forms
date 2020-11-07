<?php

namespace Forms\Fields;

/**
 * @brief A nullable boolean field.
 * never throws ValidationException
 */
class NullBooleanField extends EmptyField {
    
    
    public function __construct($opts) {
        parent::__construct($opts);
        $this->setRequired(false);
    }
    
    public function getDefaultWidget(): Widget {
        return new SelectWidget([$this->getEmpty() => $this->getEmpty(), true => 'yes', false => 'no']);
    }
    
    public function validate(): void {
        if ($this->getValue() !== $this->getEmpty()) {
            if (filter_var($this->getValue(), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === null) {
                $this->addError('invalid');
            }
        }
    }
    
    public function clean($value) {
        if ($value === $this->getEmpty()) {
            return $this->getEmptyValue();
        }
        return filter_var($this->getValue(), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
    
}