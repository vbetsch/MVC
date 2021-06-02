<?php

require_once ROOT . '/Controllers/Controller.php';

class ErrorController extends Controller
{
    public function not_found()
    {
        /* La page d'erreur 404, non trouvé */
        $this->render('404', 'Erreur404', []);
    }

    public function not_authorized()
    {
        /* La page d'erreur 403, non autorisé */
        echo 'ERROR#403 Forbidden';
    }
}