<?php

// La racine du projet, ici src
define('ROOT', dirname(__DIR__));

// Le nom du site, ici http(s)://mvc.test
define('SITE', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);

session_start();

require_once ROOT . '/Core/Router.php';
$router = Router::get_instance();
$router->get_url();