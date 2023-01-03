<?php

require_once 'Framework/Modele.php';
class Service extends Modele
{
    public function addService(string $nameService)
    {
        $sqlSelect = "SELECT * FROM services where nameService  =?";
        $addService = $this->executerRequete($sqlSelect, array($nameService));
        $RequestService = $addService->fetch();

        if ($RequestService) {
            echo "Le service existe deja !!";
            return false;
        } else {
            $sql = "INSERT INTO services(nameService) values(?)";
            $service = $this->executerRequete($sql, array($nameService));
            return $service;
        }
    }

    public function selectService()
    {
        $sql = "SELECT nameService FROM services";
        $service =  $this->executerRequete($sql);
        return $service;
    }
}
