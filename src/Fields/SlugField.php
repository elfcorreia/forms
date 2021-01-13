<?php

namespace Forms\Fields;

/**
 * @brief A slug field
 */
class SlugField extends PregCharField {
        
    public function __construct($opts) {
        $opts['preg'] = '/[a-zA-Z_\-]+/'; //todo: fix this;
        parent::__construct($opts);
    }

}