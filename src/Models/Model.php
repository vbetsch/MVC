<?php

require_once ROOT . '/Core/Db_connect.php';

abstract class Model
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion = db_connect::get_instance();
    }
}