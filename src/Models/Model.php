<?php

require_once ROOT . '/Core/db_connect.php';

abstract class Model
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion = new db_connect();
    }
}