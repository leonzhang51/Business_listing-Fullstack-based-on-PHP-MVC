<?php

class ControleurLivres {

    public function __construct() {
        $action = isset($_GET['action']) ?$_GET['action'] : 'tri';
        if( isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            $action = 'tri';
        }
        switch ($action){
            case 'tri':
                $this->getLivres();
                break;
            case 'recherche':
                $this->rechercherLivres();
                break;
            default;
                throw new exception('Action non valide');
        }
        //$this->getLivres();
    }

    /**
     * Affiche la page de liste des livres
     *
     */    
    private function getLivres() {
        $type = isset($_POST['type']) ?$_POST['type'] : 'annee';
        $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
        $reqPDO = new RequetesPDO();
        $livres = $reqPDO->getLivres($type,$order);
        $vue = new Vue("Livres", array('livres' => $livres));
    }
     /**
     * Affiche la page de recherche des livres
     *
     */    
    private function rechercherLivres() {
   
        
        $annee=isset($_POST['annee'])?$_POST['annee']:"";
        $titre=isset($_POST['titre'])?$_POST['titre']:"";
        if($titre!=""){
            $titre="%".$titre."%";
        }
        //vérifier l'année entre 1500 et cette année
        if(($annee!=="")||($titre!=="")) {
            
            try {
                
                if($annee>1500&&$annee<=date("Y")||$titre!==""){
                    
                    $reqPDO = new RequetesPDO();
                    $livres = $reqPDO->rechercherLivres($annee,$titre);
                    
                    if(empty($livres)){
                        
                       
                            
                            if(($annee!="")&&($titre=="")){
                                
                                throw new exception ('"Année non valide.');
                            }
                            if(($annee=="")&&($titre!="")){
                                
                                throw new exception ('"Aucun résultat.');  
                            }

                    }
                    else{
                        $vue = new Vue("LivresRecherche", array('livres' => $livres));
                    }
                    
                    
                }else{
                        throw new exception ('Année hors de la période disponible.');
                }
            }
            catch (Exception $e) {
                $this->erreur1($e->getMessage());
            }
            // variable $livres provenant de la fonction extract($donnees) 
        }
        else{
            $reqPDO = new RequetesPDO();
            $livres = $reqPDO->rechercherLivres($annee,$titre);
            
            $vue = new Vue("LivresRecherche", array('livres' => $livres));
            throw new exception ("vous devez saisir l'année ou le titre pour la recherche.");
            $this->erreur1($e->getMessage());
        }
  
    }
    //envoyer message a page de recherche 
    private function erreur1($msgErreur) {
        $vue = new Vue("LivresRecherche", array('msgErreur' => $msgErreur));
    }
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", array('msgErreur' => $msgErreur), 'gabaritErreur');
    }


}