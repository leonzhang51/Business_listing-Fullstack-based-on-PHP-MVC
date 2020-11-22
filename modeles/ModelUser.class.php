<?php
class ModelUser {
    public function getDatas() {
        try {
            $sPDO = SingletonPDO::getInstance();
            //get all the subcategory info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT idsubCategory as id,name FROM subcategory "
              );
            $oPDOStatement->execute();
            $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the product info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT * FROM product "
              );
            $oPDOStatement->execute();
            $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the service info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT * FROM service "
              );
            $oPDOStatement->execute();
            $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the product info for specified user from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT idproduct,name FROM product where idbizUser=1"
              );
            $oPDOStatement->execute();
            $datas['productUser'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the service info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT idservice,name FROM service where idbizUser=1"
              );
            $oPDOStatement->execute();
            $datas['serviceUser'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the city info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT * FROM city "
              );
            $oPDOStatement->execute();
            $datas['city'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            
            
            return $datas;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    public function addProduct($productOrService,$name,$description,$photo,$price,$idsubCategory,$idbizUser){
        //echo $productOrService,$name,$description,$photo,$price,$idsubCategory,$idbizUser;
       
        try {
            $sPDO = SingletonPDO::getInstance();

                $oPDOStatement = $sPDO->prepare(
                    "INSERT INTO `$productOrService` (`name`, `description`, `photo`,price,idsubCategory,idbizUser) 
                    VALUES ('$name','$description','$photo','$price','$idsubCategory','$idbizUser');"
                  );
    
                $oPDOStatement->execute();
        } 
    
        catch(PDOException $e) {
            throw $e;
            echo $e;
            die();
    
        }
        
      }
      public function addAD($name,$date,$idbizUser,$idproduct,$idcity,$type){
        //echo $productOrService,$name,$description,$photo,$price,$idsubCategory,$idbizUser;
       $tableName= ($type=="product")?"annonceproduct":"annonceservice";
       $idtype=($type=="product")?"idproduct":"idservice";
        try {
            $sPDO = SingletonPDO::getInstance();

                $oPDOStatement = $sPDO->prepare(
                    "INSERT INTO `$tableName` (`name`, `date`, `idbizUser`,$idtype,idcity) 
                    VALUES ('$name','$date','$idbizUser','$idproduct','$idcity');"
                  );
    
                $oPDOStatement->execute();
        } 
    
        catch(PDOException $e) {
            throw $e;
            echo $e;
            die();
    
        }
        
      }

}