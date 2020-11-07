<?php

namespace Forms\Widgets;

/**
 * @brief A hidden html input
 */
class HiddenInputWidget extends InputWidget {
    
    public function __construct() {
        parent::__construct('hidden');
    }
    
}