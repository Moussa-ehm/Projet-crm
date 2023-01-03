<?php

require_once 'model/User.php';
require_once 'Framework/Controleur.php';
class ControleurUser extends Controleur
{
    private $utilisateur;
    public function __construct()
    {
        $this->utilisateur = new User();
    }
    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $this->genererVue();
    }
    public function connecter()
    {
        if ($this->requete->existeParametre("email") && $this->requete->existeParametre("password")) {
            $login = $this->requete->getParametre("email");
            $mdp = $this->requete->getParametre("password");
            if ($this->utilisateur->connecter($login, $mdp)) {
                $utilisateur = $this->utilisateur->getUser($login, $mdp);
                $this->requete->getSession()->setParametreSession(
                    "idUser",
                    $utilisateur['idUser']
                );
                $this->requete->getSession()->setParametreSession(
                    "name",
                    $utilisateur['name']
                );
                $this->requete->getSession()->setParametreSession(
                    "email",
                    $utilisateur['email']
                );
                $this->rediriger("dashboard");
            } else
                $this->genererVue(
                    array('msgErreur' => 'Login ou mot de passe incorrects'),
                    "index"
                );
        } else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }
    public function deconnecter()
    {
        $this->requete->getSession()->destroySession();
        $this->rediriger("user");
    }
}
