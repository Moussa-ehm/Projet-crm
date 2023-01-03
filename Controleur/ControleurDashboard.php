<?php

require_once 'model/User.php';
require_once 'Framework/Controleur.php';
require_once 'ControleurSecurity.php';
class ControleurDashboard extends Controleur
{
    private $user;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        if ($this->requete->getSession()->existeParametreSession('idUser')) {
            $name = $this->requete->getSession()->getParametreSession("name");
            $this->genererVue(array('name' => $name));
        }
    }
}
