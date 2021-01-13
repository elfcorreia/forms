<?php

namespace Forms;

/**
 * @brief Abstraction of a form field
 */
abstract class Field {
    
    private string $label = '';
    private bool $required = true;
    private bool $disabled = false;
    private string $helpText = '';
    private $initial = null;
    private $value = null;
    private bool $bounded = false;
    private ?Widget $widget = null;
    private array $errors = [];
    private array $errorMessages = [];
    
    public abstract function validate(): void;
    public abstract function clean($value);
    public abstract function getDefaultWidget(): Widget;
        
    public function isValid() {
        return $this->bounded && count($this->errors) === 0;
    }
    
    public function getValue() {
        return $this->bounded ? $this->value : $this->initial;
    }

    public function getWidget(): Widget {
        if ($this->widget === null) {
            $this->widget = $this->getDefaultWidget();
        }
        return $this->widget;
    }

    public function bound($value): bool {
        $this->clearErrors();
        $this->bounded = true;
        $this->value = $value;
        $this->validate();
        return true;
    }
    
    public function clearErrors(): void {
        $this->errors = [];
    }
    
    public function addError(string $erro, array $args): void {
        if (array_key_exists($erro, $this->errorMessages)) {
            $this->errors[] = sprintf($this->errorMessages[$erro], $erro);
        } else {
            $this->errors[] = $erro;
        }
    }

    public function isDisabled(): bool {
        return $this->disabled;
    }

    public function getLabel(): string {
        return $this->label;
    }

    public function isRequired(): bool {
        return $this->required;
    }

    public function getHelpText(): string {
        return $this->helpText;
    }

    public function isBounded(): bool {
        return $this->bounded;
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function getInitial() {
        return $this->initial;
    }

    public function setLabel(string $label): Field {
        $this->label = $label;
        return $this;
    }

    public function setRequired(bool $required = true): Field {
        $this->required = $required;
        return $this;
    }
    
    public function setHelpText(string $helpText): Field {
        $this->helpText = $helpText;
        return $this;
    }
    
    public function setWidget(Widget $widget): Field {
        $this->widget = $widget;
        return $this;
    }
    
    public function setDisabled(bool $disabled): Field {
        $this->disabled = $disabled;
        return $this;
    }
    
    public function setErrorMessages(array $errorMessages): Field {
        $this->errorMessages = $errorMessages;
        return $this;
    }
    
    public function setInitial($initial): Field {
        $this->initial = $initial;
        return $this;
    }
}