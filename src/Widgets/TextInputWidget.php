<?php

namespace Forms\Widgets;

use Forms\Widget;

/** 
 * @brief A html text input widget
 */
class TextInputWidget extends InputWidget {
    
    public function __construct($attrs = null) {
        parent::__construct('text', $attrs);
    }
    
}