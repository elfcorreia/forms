<?php

namespace Forms\Fields;

/**
 * @brief A regular expression field
 */
class RegexpField extends CharField {
    
    private $regexp = null;
    
    public function __construct($opts) {
        parent::__construct($opts);
        if (array_key_exists('regexp', $opts)) {
            $this->regexp = $opts['regexp'];
        }
    }
    
    public function getRegexp() { return $this->regexp; }
    public function setRegexp($value) { $this->regexp = $value; }
    
    public function validate(): void {
        parent::validate();
        $valid = filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $this->regexp]]);
        if ($this->hasChanged() && !$valid) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        return filter_var($this->getValue(), FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $this->regexp]]);
    }
}