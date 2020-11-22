<?php

class ControleurUser {

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
                $this->getDatas();
                break;
            case 'recherche':
                $this->rechercherLivres();
                break;
            case 'addProduct':
                $this->addProduct();
            case 'addAD':
                $this->addAD();
            default;
                throw new exception('Action non valide');
        }
        //$this->getLivres();
    }

    /**
     * Affiche la page de liste des livres
     *
     */    
    private function getDatas() {
        
        $reqPDO = new ModelUser();
        $datas = $reqPDO->getDatas();
        $vue = new Vue("User", array('datas' => $datas));
    }
    //telecharger le image a serveur
    public function uploadPhoto($nameType){
        //echo str_replace("\\", "", Controleur::$base_uri);        
                   //$target_dir = str_replace("\\", "", Controleur::$base_uri)."/uploads/";
                   $currentDir=getcwd();
                   $uploadDirectory = "/uploads/";
                   $fileName = $_FILES[$nameType]["name"];
                   $newFileName=$fileName;
                   foreach($newFileName as $key =>$name){
                       $newFileName[$key]=time()."_".$newFileName[$key];
                       //$newFileName[$key]=$currentDir.$uploadDirectory.basename($newFileName[$key]);
                       $target_dir = $currentDir.$uploadDirectory.basename($newFileName[$key]);
                       move_uploaded_file($_FILES[$nameType]["tmp_name"][$key], $target_dir);
                       $newFileName[$key]="./uploads/".$newFileName[$key];
                   }
                   $newFileName=implode("+",$newFileName); //array to string
                   return $newFileName;

                   
                   
   }
      /**
     * add new product in system
     *
     */ 
    private function addProduct(){
        if(isset($_POST['submitProduit'])){
            try{
                if(!empty($_POST['nomProduit'])&&!empty($_POST['produitDescription'])){
                    $productOrService=$_POST['productOrService'];
                    
                    $name=$_POST['nomProduit'];
                    $description=$_POST['produitDescription'];
                    $price=$_POST['produitPrix'];
                    $idsubCategory =$_POST['produitCategories'];
                    $photo =$this->uploadPhoto('produitImgUpload'); 
                    
                    $idbizUser=$_POST['idbizUser'];      
                    $reqPDO = new ModelUser();
                    $reqPDO->addProduct($productOrService,$name,$description,$photo,$price,$idsubCategory,$idbizUser);

                    //afficher le Annonce 
                    header('Location: user');
                }
                else{
                    throw new exception ("vous devez entrer titre et le contenu .");                    
                }     
            }
            catch (Exception $e) {
                    $this->erreur($e->getMessage());
            }
        }
        else{
            header('Location: user');
        }
    }
    //create new AD
    private function addAD()   {
        if(isset($_POST['submitAD'])){
            try{
                if(!empty($_POST['name'])&&!empty($_POST['date'])){
                    $name=$_POST['name'];
                    $date =$_POST['date'];
                    $idbizUser=$_POST['idbizUser'];
                    $idproduct=$_POST['idproduct'];
                    $idcity =$_POST['idcity'];
                    $type =$_POST['type'];       
                    $reqPDO = new ModelUser();
                    $reqPDO->addAD($name,$date,$idbizUser,$idproduct,$idcity,$type);
                    //afficher Annonce 
                    header('Location: user');
                }
                else{
                    throw new exception ("vous devez entrer titre et le contenu .");
                }     
            }
            catch (Exception $e) {
                $this->erreur($e->getMessage()); 
            }
        }
        else{
            header('Location: annonce');
        }
    }
    //envoyer message a page de recherche 
   
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", array('msgErreur' => $msgErreur), 'gabaritErreur');
    }
}