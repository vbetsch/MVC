<?php

require_once ROOT . '/Controllers/Controller.php';

class UserController extends Controller
{
    public function login() {
        $error = $_SESSION['error'] ?? false;
        unset($_SESSION['error']);
        $this->render('login', ['error' => $error]);
    }

    public function process_login() {
        if (!isset($_POST['login']) or !isset($_POST['pwd'])) {
            header('Location:' . SITE . '/User/login');
            $_SESSION['error'] = 'unset';
            return;
        }

        if (empty($_POST['login']) or empty($_POST['pwd'])) {
            header('Location:' . SITE . '/User/login');
            $_SESSION['error'] = 'empty';
            return;
        }

        $login = $_POST['login'];
        $mdp = $_POST['pwd'];
    }
}