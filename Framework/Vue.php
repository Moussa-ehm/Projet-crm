<?php

require 'configuration.php';
class Vue
{
    private $fichier;
    private $titre;
    public function __construct($action, $controleur = "")
    {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }
    public function generer($donnees)
    {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererVue($this->fichier, $donnees);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $racineWeb = Configuration::get("racineWeb", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererVue(
            'Vue/Gabarit.php',
            array(
                'titre' => $this->titre, 'contenu' => $contenu,
                'racineWeb' => $racineWeb
            )
        );
        // Renvoi de la vue générée au navigateur
        echo $vue;
    }
    private function genererVue($fichier, $donnees)
    {
        //Si fichier existe
        if (file_exists($fichier)) {

            //Recuperer donnée de fichier
            extract($donnees);

            //Mise en tampon
            ob_start();

            //Appel du fichier
            require $fichier;

            return ob_get_clean();
        } else {
            throw new Exception("Fichier " . $fichier . " n'existe pas");
        }
    }
    private function nettoyer($valeur)
    {
        // Convertit les caractères spéciaux en entités HTML
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
}
