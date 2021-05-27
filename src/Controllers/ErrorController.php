<?php

require_once ROOT . '/Controllers/Controller.php';

class ErrorController extends Controller
{
    public function not_found()
    {
        echo 'ERROR#404 Not Found';
    }

    public function not_authorized()
    {
        echo 'ERROR#403 Forbidden';
    }
}