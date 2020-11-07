<?php

namespace Forms\Fields;

/**
 * @brief A slug field
 */
class SlugField extends CharField {
    
    const REGEXP = '/[a-zA-Z_\-]+/'; //todo: fix this
    
    public function __construct($opts) {
        parent::__construct($opts);
    }
    
    public function validate(): void {
        parent::validate();
        $valid = filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/[a-zA-Z_\-]+/']]);
        if ($this->hasChanged() && !$valid) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        return filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => self::REGEXP]]);
    }
}