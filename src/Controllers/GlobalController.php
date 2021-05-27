<?php

require_once ROOT . '/Controllers/Controller.php';

class GlobalController extends Controller
{
    public $default = 'index';

    public function index() {
        $this->render('index');
    }
}
