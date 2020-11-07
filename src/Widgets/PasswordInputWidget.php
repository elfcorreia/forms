<?php

namespace Forms\Widgets;

/** 
 * @brief A html password input widget
 */
class PasswordInputWidget extends InputWidget {
    
    public function __construct($attrs = null) {
        parent::__construct('password', $attrs);
    }
    
}