<?php

class ControleurShop {

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
            case 'searchAD':
                $this->searchAD();
                break;
            case 'sortingAD':
                $this->sortingAD();
                break;
            case 'sortingCategorie':
                $this->sortingCategorie();
                break;
            case 'sortingPrice':
                $this->sortingPrice();
                break;
            case 'categoryAD':
                $this->categoryAD();
                break;
            case 'addCart':
                $this->addCart();
                break;
            default;
                throw new exception('Action non valide');
        }
       
    }
    private function getDatas() {
        
        $reqPDO = new ModelShop();
        $datas = $reqPDO->getDatas();
        $vue = new Vue("Shop", array('datas' => $datas));
    }
    private function categoryAD(){
        $categoryID=$_GET['categoryID'];
        $reqPDO = new ModelShop();
        $datas = $reqPDO->categoryAD($categoryID);
        $vue = new Vue("Shop", array('datas' => $datas));
    }
    private function sortingAD(){
        $sortingAD=$_POST['sortingAD'];
        $reqPDO = new ModelShop();
        $datas = $reqPDO->sortingAD($sortingAD);
        $vue = new Vue("Shop", array('datas' => $datas));
    }
    //sorting AD by categorie
    private function sortingCategorie(){
        if(isset($_POST['subcategory'])){
            $subcategoryid=$_POST['subcategory'];
            $reqPDO = new ModelShop();
            $datas = $reqPDO->sortingCategorie($subcategoryid);
            $vue = new Vue("Shop", array('datas' => $datas));
        }
        else{
            $this->getDatas();
        }
       
    }
    //sorting AD by price
    private function sortingPrice(){
        $priceFilterMax=$_POST['priceFilterMax'];
        $priceFilterMin=$_POST['priceFilterMin'];
       
        $reqPDO = new ModelShop();
        $datas = $reqPDO->sortingPrice($priceFilterMax,$priceFilterMin);
        $vue = new Vue("Shop", array('datas' => $datas));
    }
        //search AD by title
    private function searchAD(){
            
            
            if(isset($_POST['searchTitle'])){
                $titre=$_POST['searchTitle'];
                $reqPDO = new ModelShop();
                $datas = $reqPDO->searchAD($titre);
                //var_dump($datas['results']['resultProduit'][0]['idannonce']);
                //die();
                $vue = new Vue("Shop", array('datas' => $datas));
                
            }
            
    }
    //add product or service in shopping cart
    private function addCart(){
        $reqPDO = new ModelShop(); 
        $iduser=$_GET['iduser'];
        (isset($_GET['annonceService_idannonce'])) ?$annonceService_idannonce=$_GET['annonceService_idannonce']:$annonceService_idannonce="";
        (isset($_GET['annonceProduct_idannonce'])) ?$annonceProduct_idannonce=$_GET['annonceProduct_idannonce']:$annonceProduct_idannonce="";
        if(isset( $annonceService_idannonce)||isset( $annonceProduct_idannonce)) $reqPDO->addCart($iduser,$annonceService_idannonce,$annonceProduct_idannonce);
        
        header('Location: shop');
    }


}