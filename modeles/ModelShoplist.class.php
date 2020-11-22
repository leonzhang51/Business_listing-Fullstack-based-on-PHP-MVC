<?php
class ModelShoplist {
    public function getDatas($userIdentity) {
        try {
            $sPDO = SingletonPDO::getInstance();
            //get all the service order info in shopping cart from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT service.photo,annonceservice.name,service.price,cart.orderNb,cart.id
                FROM cart
                INNER JOIN annonceservice ON cart.annonceService_idannonce=annonceservice.idannonce
                INNER JOIN service ON service.idservice=annonceservice.idservice where cart.iduser=$userIdentity"
              );
            $oPDOStatement->execute();
            $datas['cartService'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the product order info in shopping cart from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT product.photo,annonceproduct.name,product.price,cart.orderNb,cart.id
                FROM cart
                INNER JOIN annonceproduct ON cart.annonceProduct_idannonce=annonceproduct.idannonce
                INNER JOIN product ON product.idproduct=annonceproduct.idproduct where cart.iduser=$userIdentity"
              );
            $oPDOStatement->execute();
            $datas['cartProduct'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $datas;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    
      public function removeOrder($cartid){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "DELETE FROM `cart` WHERE `id` = $cartid ;"
                  );
                $oPDOStatement->execute();
               
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function modifyOrderNb($cartid,$orderNb){
        try {
          $sPDO = SingletonPDO::getInstance();
              for($i=0;$i<count($cartid);$i++){
                  $oPDOStatement = $sPDO->prepare(                    
                    "UPDATE `cart` SET `orderNb` = '$orderNb[$i]' WHERE `id` = $cartid[$i] ;"
                  );
                $oPDOStatement->execute();
              }        
        } 

        catch(PDOException $e) {
          throw $e;
      }
    }
    //add shopping cart info to order, the last step to finished order process
    public function addToOrder($iduser){
      try{
          $sPDO = SingletonPDO::getInstance();
          //get the order info from table cart
          $oPDOStatement = $sPDO->prepare(
            "SELECT `iduser`,`annonceService_idannonce`,`annonceProduct_idannonce`,`orderNb` FROM `cart` WHERE `iduser` = $iduser;"
          );
          $oPDOStatement->execute();
          $cartInfos = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
          //write cart info to order table
          foreach($cartInfos as $cartInfo){
            $annonceService_idannonce = (empty($cartInfo['annonceService_idannonce']))?"null":$cartInfo['annonceService_idannonce'];
            $annonceProduct_idannonce = (empty($cartInfo['annonceProduct_idannonce']))?"null":$cartInfo['annonceProduct_idannonce'];
            $orderNb = $cartInfo['orderNb'];
            //echo $iduser,$annonceService_idannonce,$annonceProduct_idannonce,$orderNb;
          //die();
            $oPDOStatement = $sPDO->prepare(
              "INSERT INTO `order` (`date`,`iduser`, `annonceService_idannonce`,`annonceProduct_idannonce`,`orderNb`) 
              VALUES (curdate(), $iduser,$annonceService_idannonce,$annonceProduct_idannonce,$orderNb);"
            );
            $oPDOStatement->execute();
          }
          //clear shopping cart
          $oPDOStatement = $sPDO->prepare(
              "DELETE FROM `cart` WHERE `iduser` = $iduser;"
            );
          $oPDOStatement->execute();
        
      }
      catch(PDOException $e) {
        throw $e;
      }
    }
}