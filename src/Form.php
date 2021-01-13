<?php

namespace Forms;

/**
 * @brief Base class for a form
 */
abstract class Form {
    
    private bool $bounded = false;
    private array $cleanedData = [];
    private array $errors = [];
    
    public abstract function makeFields(): void;
    
    public function isBounded() {
        return $this->bounded;
    }
    public function clearErrors() {
        $this->errors = [];
        foreach($this->getFields() as $field) {
            $field->clearErrors();
        }
    }
    public function addError($error) {
        $this->errors[] = $error;
    }
    
    public function __construct() {
        $this->makeFields();
        
        // tie-up widget with field
        foreach ($this->getFields() as $name => $field) {
            $w = $field->getWidget();
            $w->setName($name);
            $w->setField($field);
        }
    }
    
    public function getFields() {
        foreach ($this as $name => $field) {
            if ($field instanceof Field) {
                yield $name => $field;
            }
        }
    }
    
    public function getErrors(): array {
        return $this->errors;
    }
    
    public function hasErrors(): bool {
        if (!$this->bounded) {
           return false;
        }
        return !$this->isValid();
    }
    
    public function isValid(): bool {
        if (!$this->bounded) {
            return false;
        }
        if (count($this->errors) > 0) {
            return false;
        }
        foreach ($this->getFields() as $field) {
            if (!$field->isValid()) {
                return false;
            }
        }
        return true;
    }
    
    public function bound(array $values): bool {
        $this->bounded = true;
        foreach ($this->getFields() as $name => $field) {
            $field->bound(isset($values[$name]) ? $values[$name] : null);
        }
        return true;
    }
    
    public function reset()  {
        $this->bounded = false;
        $this->clearErrors();
        foreach ($this->getFields() as $field) {
            $field->bound(null);            
        }
        return true;
    }
    
    private function clean() {
        $this->cleanedData = [];
        $this->clearErrors();
        foreach ($this->getFields() as $name => $field) {
            $field->clearErrors();
            $field->validate();
            if ($field->isValid()) {
                $this->cleanedData[$name] = $field->clean($field->getValue());
            }
        }
    }
    
    public function getCleanedData() {        
        return $this->cleanedData;
    }
    
    public function __toString(): string {
       return $this->html();
    }
    
    public function setInitial(array $data): void {
        foreach ($data as $name => $value) {
            if ($this->$name instanceof Field) {
                $this->$name->setInitial($value);
            }
        }
    }

    public function html(?Layout $layout = null): string {
        if ($layout === null) {
            $layout = new Layouts\Html5Layout();
        }
        return $layout->render($this);
    }
}