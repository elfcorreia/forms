<?php

namespace Forms\Widgets;

/** 
 * @brief A html email input widget
 */
class EmailInputWidget extends InputWidget {
    
    public function __construct($attrs = null) {
        parent::__construct('email', $attrs);
    }
    
}