<?php

class ControleurProductdetail {
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
        //$reqPDO = new ModelShoplist();
        //$datas = $reqPDO->getDatas($this->userIdentity);
        $datas="";
        $vue = new Vue("Productdetail", array('datas' => $datas));
    }
}