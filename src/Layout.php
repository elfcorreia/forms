<?php

namespace Forms;

/**
 * @brief Abstraction to layout a form
 */
interface Layout {
    public function render(Form $form): string;
}