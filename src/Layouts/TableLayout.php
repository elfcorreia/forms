<?php

namespace Forms\Layout;

/**
 * @brief Renders a form in a HTML table
 */
class TableLayout implements Layout {
    
    public function render(Form $form): string {        
        $s = '<table>';
        
        foreach ($form->getErrors() as $e) {
            $s .= '<tr><td></td><td style="font-size: small; color: red;">'.$e.'</td><td></td></tr>';
        }
        
        foreach ($form->getFields() as $field) {
            $s .= '<tr>';
            $s .= '<td style="text-align: right;">'.$field->getLabel();
            if ($field->isRequired()) {
                $s .= '*';
            }
            $s .= '</td>';
            $s .= '<td>'.$field->getWidget()->getHtml().'</td>';
            $s .= '<td>'.$field->getHelpText().'</td>';
            $s .= '</tr>';
            
            foreach ($field->getErrors() as $e) {
                $s .= '<tr><td></td><td style="font-size: small; color: red;">'.$e.'</td><td></td></tr>';
            }
        }
        $s .= '</table>';
        return $s;
    }    
}