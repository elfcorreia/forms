<?php

namespace Forms\Fields;

/**
 * @brief Base class for fields tha can have empty values
 */
abstract class EmptyField extends Field {
    
    private $empty = '';
    private $emptyValue = null;
    
    public function getEmpty() {
        return $this->empty;
    }
    public function getEmptyValue() {
        return $this->emptyValue;
    }
    
    public function setEmpty($v) {
        $this->empty = $v;
    }
    public function setEmptyValue($v) {
        $this->emptyValue = $v;
    }
}