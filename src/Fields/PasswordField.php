<?php

namespace Forms\Fields;

use Forms\Field;

/**
 * @brief An password field
 */
class PasswordField extends CharField {
    
    public function __construct() {
        $this->setStrip(false);
    }
    
    public function getDefaultWidget(): Widget {
        return new PasswordInputWidget();
    }
       
}
