<?php

namespace Forms\Layouts;

use Forms\Layout;
use Forms\Form;

class Html5Layout implements Layout {

    public function render(Form $form): string {
        $s = '';

        $s .= '<div>';
        foreach ($form->getErrors() as $e) {
            $s .= '<div>'.$e.'</div>';
        }
        $s .= '</div>';

        foreach ($form->getFields() as $name => $field) {
            $s .= '<label for="'.$name.'">'.$field->getLabel().'</label>';
            $s .= '<div>'.$field->getWidget()->getHtml().'</div>';
            $s .= '<div>'.$field->getHelpText().'</div>';            
            $s .= '<div>';
            foreach ($field->getErrors() as $e) {
                $s .= '<div>'.$e.'</div>';
            }
            $s .= '</div>';
        }        
        return $s;
    }

}