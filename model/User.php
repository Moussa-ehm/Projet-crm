<?php
require_once 'Framework/Modele.php';
class User extends Modele
{

    public function connecter($login, $mdp)
    {
        $pass = sha1($mdp);
        $sql = "SELECT idUser FROM user WHERE email = ? AND password =  ?";
        $utilisateur = $this->executerRequete($sql, array($login, $pass));
        return ($utilisateur->rowCount() == 1);
    }
    public function getUser($email, $password)
    {
        $pass = sha1($password);
        $sql = "SELECT idUser,name,email,password FROM user WHERE email = ? AND password =  ?";
        $login = $this->executerRequete($sql, array($email, $pass));

        if ($login->rowCount() == 1) {
            return $login->fetch();
        } else {
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
        }
    }
    public function addUser($name, $email, $password)
    {
        $sqlSelect = "SELECT * FROM user WHERE email=?";
        $add = $this->executerRequete($sqlSelect, array($email));
        $RequestUser = $add->fetch();

        if ($RequestUser) {
            echo "L'email existe deja !!";
            return false;
        } else {
            $pass = sha1($password);
            $sql = "INSERT INTO user(name, email, password )
            values( ?, ?, ?)";
            $this->executerRequete($sql, array($name, $email, $pass));
            echo "Inscription réussi !!";
            return $RequestUser;
        }
    }

    public function sessionDestroy()
    {
        session_start();
        session_unset();
        session_destroy();
    }
    public function form()
    {
        $sqlSelect = "SELECT * FROM user ";
        $add = $this->executerRequete($sqlSelect);
        return $add;
    }
}
