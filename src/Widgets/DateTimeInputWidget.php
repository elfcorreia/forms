<?php

namespace Forms\Widgets;

/** 
 * @brief A html5 datetime input widget
 */
class DateTimeInputWidget extends InputWidget {
    
    public function __construct($attrs = null) {
        parent::__construct('datetime', $attrs);
    }
    
}