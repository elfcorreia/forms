<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * @brief A TypedChoice field
 */
class TypedChoiceField extends ChoiceField {
    
    private $coerce = null;
    
    public function __construct($opts) {
        parent::__construct($opts);
        if (array_key_exists('coerce', $opts)) {
            if (!is_callable($opts['coerce'])) {
                throw new \Exception("coerce must be a Callable");
            }
            $this->coerce = $opts['coerce'];
        }
    }
    
    public function getCoerce() { return $this->coerce; }
    
    public function clean($value) {
        if ($value === $this->getEmpty()) {
            return $this->getEmptyValue();
        }
        if ($this->coerce !== null) {
            $c = $this->coerce;
            return $c($value);
        }
        return $value;
    }
}