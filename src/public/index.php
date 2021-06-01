<?php

// La racine du projet, ici src
define('ROOT', dirname(__DIR__));

// Le nom du site, ici http(s)://mvc.test
define('SITE', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);

session_start();

/* ROUTEUR */
// Contrôleur/Méthodes/paramètres


$uri = $_GET['page'];

// strlen() => longueur de la chaîne de caractères
if (strlen($uri) === 0) {
    // Le contrôleur avec notre page d'Accueil
    $uri = 'Global/index';
}

// On coupe l'uri au niveau du / pour obtenir un tableau
$params = explode('/', $uri);

// On récupère le nom du contrôleur
// ucfirst() => première lettre en majuscule

$controller = ucfirst($params[0]);

// file_exists() => Recherche si un fichier existe dans un dossier
if (!file_exists(ROOT . '/Controllers/' . $controller . 'Controller.php')) {
    // Envoit du code d'erreur au client
    http_response_code(404);
    $controller = 'Error';
}

// Si il existe, redirection vers le contrôleur
require_once ROOT . '/Controllers/' . $controller . 'Controller.php';
$controller .= 'Controller';
$controller = new $controller();

// Si il n'y a pas de paramètre-méthode on mets _default(), sinon on l'affecte à la méthode
$method = $params[1] ?? $controller->default;

// On va chercher la bonne méthode
$method = method_exists($controller, $method) ? $method: $controller->default;

if ($method === 'not_found') {
    require_once ROOT . '/Controllers/ErrorController.php';
    $controller = new ErrorController();
}

// On appelle la méthode avec les paramètres restants
$controller->$method(array_slice($params, 1));
