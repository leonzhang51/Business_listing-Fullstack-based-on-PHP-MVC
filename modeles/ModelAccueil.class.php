<?php

class ModelAccueil {
    public function getDatas() {
        try {
            $sPDO = SingletonPDO::getInstance();
            //get all the city info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT * FROM city "
              );
            $oPDOStatement->execute();
            $datas['city'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            //get all the category info from database
            $oPDOStatement = $sPDO->prepare(
                "SELECT * FROM category "
              );
            $oPDOStatement->execute();
            $datas['category'] = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            
            return $datas;
        } catch(PDOException $e) {
            throw $e;
        }
    }
}