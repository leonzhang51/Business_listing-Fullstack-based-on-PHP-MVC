<?php

class RequetesPDO {
    public function connector($identifiant,$mdp){
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "SELECT identifiant, mdp 
                    FROM administrateur 
                    where identifiant='$identifiant' and mdp = '$mdp' "
                  );
                $oPDOStatement->execute();
                $admin = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
  
            return $admin;
        } 

        catch(PDOException $e) {
            throw $e;
        }
    }
    
    public function getLivres($type,$order) {
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                "SELECT LI.id_livre, LI.id_auteur, LI.titre, LI.annee, CONCAT(AU.nom,' ', AU.prenom) AS auteur
                 FROM auteur AU 
                 INNER JOIN livre LI ON AU.id_auteur = LI.id_auteur
                 ORDER  BY $type $order"
              );
            $oPDOStatement->execute();
            $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $livres;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    
    public function rechercherLivres($annee,$titre){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "SELECT LI.id_livre, LI.id_auteur, LI.titre, LI.annee, CONCAT(AU.nom,' ', AU.prenom) AS auteur
                    FROM auteur AU 
                    INNER JOIN livre LI ON AU.id_auteur = LI.id_auteur
                    where LI.annee='$annee' or LI.titre like '$titre' 
                    ORDER  BY annee ASC"
                  );
                $oPDOStatement->execute();
                $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
           
           
            
            return $livres;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    
    public function getAuteurInfo(){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "SELECT id_auteur as id, CONCAT(nom,' ',prenom) as nom FROM auteur;"
                  );
                $oPDOStatement->execute();
                $auteurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            return $auteurs;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
   
    public function ajouterLivre($ajouterLivreTitre,$ajouterLivreAnnee,$ajouterLivreAuteur){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "INSERT INTO `livre` (`id_livre`, `id_auteur`, `titre`, `annee`) 
                    VALUES (NULL, '$ajouterLivreAuteur', '$ajouterLivreTitre', '$ajouterLivreAnnee');"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function modifierLivre($modifierLivreTitre,$modifierLivreAnnee,$modifierLivreAuteur,$id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "UPDATE `livre` SET `id_auteur` = '$modifierLivreAuteur', `titre` = '$modifierLivreTitre', 
                    `annee` = '$modifierLivreAnnee' WHERE `livre`.`id_livre` = $id;"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function supprimerLivre($id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "DELETE FROM `livre` WHERE `livre`.`id_livre` = $id ;"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function getAuteurs($type,$order){
        
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                " SELECT AU.id_auteur,  CONCAT(AU.nom,' ', AU.prenom) AS auteur,COUNT( LI.titre) as Nb_livres
                FROM auteur AU 
                LEFT JOIN livre LI ON AU.id_auteur = LI.id_auteur
                GROUP BY auteur
                 ORDER  BY $type $order"
              );
            $oPDOStatement->execute();
            $auteurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $auteurs;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    public function getAuteurByID($id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                " SELECT * FROM auteur AU 
                where id_auteur=$id;"
              );
            $oPDOStatement->execute();
            $auteurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $auteurs;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    public function ajouterAuteur($ajouterAuteurNom,$ajouterAuteurPrenom){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`) 
                    VALUES (NULL, '$ajouterAuteurNom', '$ajouterAuteurPrenom');"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function modifierAuteur($modifierAuteurNom,$modifierAuteurPrenom,$id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "UPDATE `auteur` SET `nom` = '$modifierAuteurNom', `prenom` = '$modifierAuteurPrenom'
                     WHERE `auteur`.`id_auteur` = $id;"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function supprimerAuteur($id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                    
                "SET FOREIGN_KEY_CHECKS=0 ;"
              );
              $oPDOStatement->execute();
                $oPDOStatement = $sPDO->prepare(
                    
                    "DELETE FROM `auteur` WHERE `auteur`.`id_auteur` = $id ;"
                  );
                $oPDOStatement->execute();
                $oPDOStatement = $sPDO->prepare(
                    
                    "SET FOREIGN_KEY_CHECKS=1 ;"
                  );
                  $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function getAdministrateurs($type,$order){
        
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                " SELECT * FROM administrateur 
                    ORDER  BY $type $order"
              );
            $oPDOStatement->execute();
            $administrateurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $administrateurs;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    public function getAdministrateurByID($id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
            $oPDOStatement = $sPDO->prepare(
                " SELECT * FROM administrateur 
                where id_administrateur=$id;"
              );
            $oPDOStatement->execute();
            $administrateurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $administrateurs;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    public function ajouterAdministrateur($ajouterIdentifiant,$ajouterMDP){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    "INSERT INTO `administrateur` (`id_administrateur`, `identifiant`, `mdp`) 
                    VALUES (NULL, '$ajouterIdentifiant', '$ajouterMDP');"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function modifierAdministrateur( $modifierIdentifiant,$modifierMDP,$id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "UPDATE `administrateur` SET `identifiant` = '$modifierIdentifiant', `mdp` = '$modifierMDP'
                     WHERE `administrateur`.`id_administrateur` = $id;"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }
    public function supprimerAdministrateur($id){
        
        try {
            $sPDO = SingletonPDO::getInstance();
           
                $oPDOStatement = $sPDO->prepare(
                    
                    "DELETE FROM `administrateur` WHERE `administrateur`.`id_administrateur` = $id ;"
                  );
                $oPDOStatement->execute();
                //$results = $oPDOStatement->fetchAll();
                //$results = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

            //return $results;
        } 

        catch(PDOException $e) {
            throw $e;
        }
        
    }

    
}