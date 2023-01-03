<?php

require_once 'Framework/Controleur.php';
require_once 'model/Service.php';
class controleurService extends Controleur
{
    private $service;
    public function __construct()
    {
        $this->service = new Service();
    }
    //Ajout de service
    /* public function service(string $nameService)
    {
        $service = $this->service->addService($nameService);

    } */
    //Selection de service
    /*public function ctrSelectService()
    {
        $selectService = $this->service->selectService();
        $vue = new Vue('Service');
        $vue->generer(array('selectService' => $selectService));
    } */
    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $this->genererVue();
    }
    public function addService()
    {
        if ($this->requete->getParametre("nameService")) {
            $nameService = $this->requete->getParametre("nameService");
            $service = $this->service->addService($nameService);
            $this->genererVue(array('selectService' => $service));
        } else
            throw new Exception("Action impossible : Impossible de récuperer le nameService");
    }
}
