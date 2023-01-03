<?php

require_once 'Framework/Controleur.php';
abstract class ControleurSecurity extends Controleur
{
    public function executerAction($action)
    {
        if ($this->requete->getSession()->existeParametreSession('idUser')) {
            parent::executerAction($action);
        } else {
            $this->rediriger("connexion");
        }
    }
}
