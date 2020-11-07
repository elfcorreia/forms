<?php

namespace Forms\Fields;

/**
 * @ A char field
 */
class CharField extends Field {
    
    private int $minLength = -1;
    private int $maxLength = -1;
    private bool $strip = true;
    
    public function __construct() {
        $this->setInitial('');
    }
    
    public function getMinLength(): int {
        return $this->minLength;
    }
    public function getMaxLength(): int {
        return $this->maxLength;
    }
    public function isStrip(): bool {
        return $this->strip;
    }
    
    public function setMinLength(int $minLength): Field {
        $this->minLength = $minLength;
        return $this;
    }
    public function setMaxLength(int $maxLength): Field {
        $this->maxLength = $maxLength;
        return $this;
    }
    public function setStrip(bool $strip): Field {
        $this->strip = $strip;
        return $this;
    }
    
    public function getDefaultWidget(): Widget {
        return new TextInputWidget();
    }
    
    public function validate(): void {
        $v = $this->clean($this->getValue());
        
        if ($this->isRequired() && (!$this->isBounded() || strlen($v) === 0)) {
            $this->addError('required');
        }
        if ($this->minLength !== -1 && strlen($v) < $this->minLength) {
            $this->addError('minLength');
        }
        if ($this->maxLength !== -1 && strlen($v) > $this->maxLength) {
            $this->addError('maxLength');
        }
    }
    
    public function clean($value) {
        if ($value !== null) {
            return $this->strip ? trim($value) : $value;
        }
        return null;
    }
}
