<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * @brief Base class for fields tha can have empty values
 */
abstract class AbstractEmptyField extends Field {
    
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