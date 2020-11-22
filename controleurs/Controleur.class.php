<?php

class Controleur {

    public static $base_uri = "\/sireta_community";
    
    private $controleurs = array(
        ""          => "ControleurAccueil",
        "accueil"   => "ControleurAccueil",
        "livres"    => "ControleurLivres",
        "admin"     => "ControleurAdmin",
        "user"      => "ControleurUser",
        "shop"      => "ControleurShop",
        "shoplist"      => "ControleurShoplist",
        "productdetail" => "ControleurProductdetail"
    ); 

    /**
     * Constructeur qui valide l'URI et instancie le controleur correspondant
     *
     */
    public function __construct() {
        try {
            $regExp = '/^'.self::$base_uri.'[\/]?([^\?]*)(\?.*)?$/';
            $requestUri = strtolower($_SERVER["REQUEST_URI"]);
            if (preg_match($regExp, $requestUri, $result)) {
                foreach ($this->controleurs as $uri => $controleur) {
                    if ($uri == $result[1]) {
                        new $controleur;
                        exit;
                    }
                }
            }
            throw new exception ('URL non valide.');
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    /**
     * Méthode qui affiche une page d'erreur
     *
     */
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", array('msgErreur' => $msgErreur), 'gabaritErreur');
    }

}