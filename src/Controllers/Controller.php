<?php

abstract class Controller
{

    // La valeur 'not_found' va rédiger vers une page 404
    public $default = 'not_found';

    public function render(string $file, $args = []) {
        /*
         * Permet l'affichage du contenu de la page entouré du template principale du site
         */


        // Creation d'un buffer qui stock les sortie (stdout => buffer)
        ob_start();

        // Ajout de la page dans le buffer
        require_once ROOT . '/Views/' . basename(get_class($this), 'Controller') . '/' . $file . '.php';

        // Récupération du contenu mis dans le buffer en tant que variable
        $content = ob_get_clean();

        // Impression du template et injection du contenu principale
        require_once ROOT . '/Views/template.phtml';
    }
}
