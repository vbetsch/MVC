<?php

abstract class Controller
{
    public $default = 'not_found';

    public function render(string $file, $args = []) {
        ob_start();
        require_once ROOT . '/Views/' . basename(get_class($this), 'Controller') . '/' . $file . '.php';
        $content = ob_get_clean();
        require_once ROOT . '/Views/template.phtml';
    }
}
