<?php

namespace Forms\Fields;

/** 
 * @brief An choice field 
 */
class ChoiceField extends EmptyField {
    
    private $choices = [];
    
    public function setChoices($choices) {
        $this->choices = $choices;
    }
    public function getChoices() {
        return $this->choices;
    }
    
    public function getDefaultWidget(): Widget {
        return new SelectWidget(array_merge([$this->getEmpty() => $this->getEmpty()], $this->choices));
    }
    
    public function validate(): void {
        if ($this->isRequired() && $this->getValue() === $this->getEmpty()) {
            $this->addError('required');
            return;
        }
        
        if (!array_key_exists($this->getValue(), $this->choices)) {
            $this->addError('invalid');
        }
    }
    
    public function clean($value) {
        return $value === $this->getEmpty() ? $this->getEmptyValue() : $value;
    }
    
}