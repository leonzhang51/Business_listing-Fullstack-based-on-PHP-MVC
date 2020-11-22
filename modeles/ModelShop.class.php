<?php
class ModelShop {
    public function getDatas() {
          try {
                $sPDO = SingletonPDO::getInstance();
                //get all the subcategory info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT idsubCategory as id,name FROM subcategory "
                  );
                $oPDOStatement->execute();
                $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                //get all the product AD info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT annonceproduct.name,annonceproduct.idannonce,product.price,product.photo,product.description from annonceproduct
                    INNER JOIN product
                    ON annonceproduct.idproduct=product.idproduct "
                  );
                $oPDOStatement->execute();
                $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                //get all the service AD info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT annonceservice.name,annonceservice.idannonce,service.price,service.photo,service.description from annonceservice
                    INNER JOIN service
                    ON annonceservice.idservice=service.idservice "
                  );
                $oPDOStatement->execute();
                $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                
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
      public function categoryAD($categoryID){
        try {
              $sPDO = SingletonPDO::getInstance();
              //get all the subcategory info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT idsubCategory as id,name FROM subcategory "
                );
              $oPDOStatement->execute();
              $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
              //get all the product AD info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT annonceproduct.name,annonceproduct.idannonce,product.price,product.photo,product.description,category.idcategory from annonceproduct
                  INNER JOIN product
                  ON annonceproduct.idproduct=product.idproduct
                  INNER JOIN subcategory
                  ON subcategory.idsubCategory=product.idsubCategory
                  INNER JOIN category
                  ON subcategory.idcategory=category.idcategory
                  WHERE category.idcategory=$categoryID "
                );
              $oPDOStatement->execute();
              $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
              //get all the service AD info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT annonceservice.name,annonceservice.idannonce,service.price,service.photo,service.description,category.idcategory from annonceservice
                  INNER JOIN service
                  ON annonceservice.idservice=service.idservice
                                    INNER JOIN subcategory
                                    ON subcategory.idsubCategory=service.idsubCategory
                                    INNER JOIN category
                                    ON subcategory.idcategory=category.idcategory
                                    WHERE category.idcategory=$categoryID "
                );
              $oPDOStatement->execute();
              $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
              
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
    public function sortingAD($sortingAD){
      try {
              $sPDO = SingletonPDO::getInstance();
              //get all the subcategory info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT idsubCategory as id,name FROM subcategory "
                );
              $oPDOStatement->execute();
              $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
              //get all the product AD info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT annonceproduct.name,annonceproduct.idannonce,product.price,product.photo,product.description from annonceproduct
                  INNER JOIN product
                  ON annonceproduct.idproduct=product.idproduct ORDER BY name $sortingAD"
                );
              $oPDOStatement->execute();
              $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
              //get all the service AD info from database
              $oPDOStatement = $sPDO->prepare(
                  "SELECT annonceservice.name,annonceservice.idannonce,service.price,service.photo,service.description from annonceservice
                  INNER JOIN service
                  ON annonceservice.idservice=service.idservice ORDER BY name $sortingAD"
                );
              $oPDOStatement->execute();
              $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);            
              return $datas;
        } catch(PDOException $e) {
          throw $e;
      }

    }
    public function sortingCategorie($subcategoryid){
      try {
                $sPDO = SingletonPDO::getInstance();
                //get all the subcategory info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT idsubCategory as id,name FROM subcategory "
                  );
                $oPDOStatement->execute();
                $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                //get all the product AD info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT annonceproduct.name,annonceproduct.idannonce,product.price,product.photo,product.description from annonceproduct
                    INNER JOIN product
                    ON annonceproduct.idproduct=product.idproduct  WHERE product.idsubCategory=$subcategoryid"
                  );
                $oPDOStatement->execute();
                $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                //get all the service AD info from database
                $oPDOStatement = $sPDO->prepare(
                    "SELECT annonceservice.name,annonceservice.idannonce,service.price,service.photo,service.description from annonceservice
                    INNER JOIN service
                    ON annonceservice.idservice=service.idservice WHERE service.idsubCategory=$subcategoryid"
                  );
                $oPDOStatement->execute();
                $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);            
                return $datas;
          } catch(PDOException $e) {
            throw $e;
        }
    }
    public function sortingPrice($priceFilterMax,$priceFilterMin){
      
      try {
        $sPDO = SingletonPDO::getInstance();
        //get all the subcategory info from database
        $oPDOStatement = $sPDO->prepare(
            "SELECT idsubCategory as id,name FROM subcategory "
          );
        $oPDOStatement->execute();
        $datas['subcategory'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        //get all the product AD info from database
        $oPDOStatement = $sPDO->prepare(
            "SELECT annonceproduct.name,annonceproduct.idannonce,product.price,product.photo,product.description from annonceproduct
            INNER JOIN product
            ON annonceproduct.idproduct=product.idproduct  WHERE product.price BETWEEN $priceFilterMin AND $priceFilterMax"
          );
        $oPDOStatement->execute();
        $datas['product'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        //get all the service AD info from database
        $oPDOStatement = $sPDO->prepare(
            "SELECT annonceservice.name,annonceservice.idannonce,service.price,service.photo,service.description from annonceservice
            INNER JOIN service
            ON annonceservice.idservice=service.idservice WHERE service.price BETWEEN $priceFilterMin AND $priceFilterMax"
          );
        $oPDOStatement->execute();
        $datas['service'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
                 
        return $datas;
      } catch(PDOException $e) {
        throw $e;
      }

    }
    public function searchAD($titre){
      try{
          $sPDO = SingletonPDO::getInstance();
          //obtenir result de rechercher dans annonce de produit
          $oPDOStatement = $sPDO->prepare(
            "SELECT * FROM annonceproduct WHERE INSTR(name,'$titre')>0;"
          );
          $oPDOStatement->execute();
          $results['resultProduit'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
          
          foreach($results['resultProduit'] as &$resultProduit){
  
            //obtenir infomation de produit
  
            $produitId=$resultProduit['idproduct'];
            $oPDOStatement = $sPDO->prepare(
            "SELECT name,description,photo,price
            FROM product
            WHERE idproduct=$produitId"
          );
          $oPDOStatement->execute();
          $infoProduit = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
          $resultProduit['infoproduit']=$infoProduit;
  
        } 
          //obtenir result de rechercher dans annonce de service
          $oPDOStatement = $sPDO->prepare(
            "SELECT * FROM annonceservice WHERE INSTR(name,'$titre')>0;"
          );
          $oPDOStatement->execute();
          $resultService = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
          $results['resultService']=$resultService;
          foreach($results['resultService'] as &$resultService){
  
            //obtenir infomation de produit
  
            $serviceId=$resultService['idservice'];
            $oPDOStatement = $sPDO->prepare(
            "SELECT name,description,photo,price
            FROM service
            WHERE idservice=$serviceId"
          );
          $oPDOStatement->execute();
          $infoService = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
          $resultService['infoservice']=$infoService;
  
        }
        $datas=$this->getDatas();
        $datas['results']=$results; 
        //var_dump($datas['results']);
        //die();
          return $datas; 
      }
      catch(PDOException $e) {
        throw $e;
      }
        
    }
    //place order for product or service
    public function addCart($iduser,$annonceService_idannonce,$annonceProduct_idannonce){
      try{
          $sPDO = SingletonPDO::getInstance();
          //obtenir result de rechercher dans annonce de produit
          $oPDOStatement = $sPDO->prepare(
            "INSERT INTO `cart` (`iduser`, `annonceService_idannonce`, `annonceProduct_idannonce`) 
            VALUES ('$iduser','$annonceService_idannonce','$annonceProduct_idannonce');"
          );
          $oPDOStatement->execute();
        
      }
      catch(PDOException $e) {
        throw $e;
      }
    }
}