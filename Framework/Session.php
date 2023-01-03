<?php

class Session
{

    public function __construct()
    {
        session_start();
    }
    public function destroySession()
    {
        session_unset();
        session_destroy();
    }
    public function existeParametreSession($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }
    public function setParametreSession($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }
    public function getParametreSession($nom)
    {
        if ($this->existeParametreSession($nom)) {
            return $_SESSION[$nom];
        } else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }
}
