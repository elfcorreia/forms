<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * @brief A regular expression field
 */
class PregCharField extends CharField {
    
    private $preg = null;
    
    public function __construct($opts) {
        parent::__construct($opts);
        if (array_key_exists('preg', $opts)) {
            $this->preg = $opts['regexp'];
        }
    }
    
    public function getPreg() { return $this->preg; }
    public function setPreg($value) { $this->preg = $value; }
    
    public function validate(): void {
        parent::validate();
        $valid = filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $this->preg]]);
        if ($this->hasChanged() && !$valid) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        return filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $this->preg]]);
    }
}