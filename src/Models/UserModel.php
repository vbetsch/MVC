<?php

require_once ROOT . '/Models/Model.php';

class UserModel extends Model
{
    public function verify_user($login, $authentification_string): ?int
    {
        $get_user = '
                select id
                from mvc.users
                where login = :login
                and pwd = :mdp;
        ';

        $user = $this->connexion->execute($get_user, ['login' => $login, 'mdp' => $authentification_string])->fetch();
        return $user['id'] ? $user['id'] : null;
    }

    public function get_user_by_id($id): ?string
    {
        $get_user_id = '
                select login
                from mvc.users
                where id = :id;
        ';

        $user = $this->connexion->execute($get_user_id, ['id' => $id])->fetch();
        return $user['login'] ? $user['login'] : null;
    }
}