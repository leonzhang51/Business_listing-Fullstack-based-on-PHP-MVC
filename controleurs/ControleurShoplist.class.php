<?php

class ControleurShoplist {
    public $userIdentity=1;
    public function __construct() {
       
	 //user id
	

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
            
            case 'addToOrder':
                $this->addToOrder();
                break;
            case 'removeOrder':
                $this->removeOrder();
                break;
            case 'modifyOrderNb':
                $this->modifyOrderNb();
                break;
            default;
                throw new exception('Action non valide');
        }
       
    }
    private function getDatas(){
        $reqPDO = new ModelShoplist();
        $datas = $reqPDO->getDatas($this->userIdentity);
        
        $vue = new Vue("Shoplist", array('datas' => $datas));
    }

    //remove order from shopping cart
    private function removeOrder(){
        if(isset($_GET['cartid'])){
            $reqPDO = new ModelShoplist(); 
            $cartid=$_GET['cartid']; 
            $reqPDO->removeOrder($cartid);
        } 
        header('Location: shoplist');
    }
    //modifier the number of order in shopping cart
    private function modifyOrderNb(){
        if(isset($_POST['cartid'])&&isset($_POST['orderNb'])){
            $cartid=$_POST['cartid'];
            $orderNb=$_POST['orderNb'];
            $reqPDO = new ModelShoplist();
            $reqPDO->modifyOrderNb($cartid,$orderNb); 
        }
        header('Location: shoplist');

        
    }
        //add shopping cart info to order, the last step to finished order process
        private function addToOrder(){
            $reqPDO = new ModelShoplist(); 
            $iduser=$_GET['userid'];
            $reqPDO->addToOrder($iduser);
            
            header('Location: shop');
        }


    //envoyer message a page de recherche 
    private function erreur1($msgErreur) {
        $vue = new Vue("LivresRecherche", array('msgErreur' => $msgErreur));
    }
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", array('msgErreur' => $msgErreur), 'gabaritErreur');
    }
}