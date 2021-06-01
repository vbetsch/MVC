<?php

require_once ROOT . '/Controllers/Controller.php';
require_once ROOT . '/Models/UserModel.php';

class UserController extends Controller
{
    private $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }

    public function login() {

        // Récupération de la possible erreur
        $error = $_SESSION['error'] ?? false;

        // Suppression de l'erreur pour éviter le ré-affichage non prévu
        unset($_SESSION['error']);

        // Affichage de la page
        $this->render('login', ['error' => $error]);
    }

    public function process_login() {

        // Vérification de l'existence des données envoyées par le client
        if (!isset($_POST['login']) or !isset($_POST['pwd'])) {
            header('Location:' . SITE . '/User/login');
            $_SESSION['error'] = 'unset';
            return;
        }

        // Vérification du contenu
        if (empty($_POST['login']) or empty($_POST['pwd'])) {
            header('Location:' . SITE . '/User/login');
            $_SESSION['error'] = 'empty';
            return;
        }

        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['pwd']);

        $user_id = $this->user_model->verify_user($login, $mdp);

        if (is_null($user_id))
        {
            header('Location:' . SITE . '/User/login');
            $_SESSION['error'] = 'invalid';
            return;
        }

        $login = $this->user_model->get_user_by_id($user_id);

        $_SESSION['user'] = ['id' => $user_id, 'name' => $login];

        $this->render("dashboard", ["name" => $_SESSION['user']['name']]);
        // => $data['name']; (dans dashboard.php)
    }
}