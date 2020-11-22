<?php

class ControleurAccueil {

    public function __construct() {
        $this->accueil();
    }

    /**
     * Affiche la page d'accueil 
     *
     */    
    public function accueil() {
        $reqPDO = new ModelAccueil();
        $datas = $reqPDO->getDatas();
        $vue = new Vue("Accueil",array('datas' => $datas));
    }
}