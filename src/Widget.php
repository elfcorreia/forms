<?php

namespace Forms;

/** 
 * @brief Abstraction of a Form Widget 
 */
abstract class Widget {
    
    private $name;
    private $field;
    
    function getName() { return $this->name; }
    function getField() { return $this->field; }
    function setName(string $name) { $this->name = $name; }
    function setField(Field $field) { $this->field = $field; }    
    function getHtml(array $options = []): string { return ''; }
}