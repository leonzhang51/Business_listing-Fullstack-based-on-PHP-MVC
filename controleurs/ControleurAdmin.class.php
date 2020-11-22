<?php
class ControleurAdmin extends Controleur {
    private $item    = "livre";
    private $action  = "get";
    private $id      = "";
    
    
     /**
      * Contrôle de l'URL pour exécuter l'action qui en découle
      *
      */  
     public function __construct() {

          if (isset($_SESSION['identifiant'])) {

               $this->item   = isset($_GET['item'])   ? $_GET['item']   : "livre";
               $this->action = isset($_GET['action']) ? $_GET['action'] : "get";
               $this->id     = isset($_GET['id'])     ? $_GET['id']     : "";
               
               if (in_array($this->item, ["administrateur", "livre", "auteur"])) {
                    if (in_array($this->action, ["get", "ajouter", "modifier", "supprimer"])) {
                         $item   = ucfirst($this->item);
                         $action = $this->action;
                         if ($action === "get") $item .= "s";
                         $methode = $action.$item;
                         $this->$methode();
                         exit;
                    }
                    if ($this->action === "deconnecter") {
                         $this->deconnecter();
                         exit;
                    }
                    throw new exception ("Action invalide");
               }
               throw new exception ("Item invalide");
          } else {
            $this->connecter();
          }


     }
     private function connecter()   {

          $identifiant=isset($_POST['identifiant'])?$_POST['identifiant']:"";
          
          $mdp=isset($_POST['mdp'])?$_POST['mdp']:"";
          
          $reqPDO = new RequetesPDO();
          
          $oConnecteur = $reqPDO->connector($identifiant,$mdp);
          try{
               if(empty($oConnecteur)){
                    if(isset($_POST['identifiant'])){
                         throw new exception ('Entrez correct ID et mot de passe svp.');
                    }
                    else{
                         $vue = new Vue("Connecteur", array('oConnecteur' => $oConnecteur));
                    }
                    
               }
               else{
                    $_SESSION['identifiant']=$identifiant;
                    header('Location: admin');
               }
          }catch (Exception $e) {
               $this->erreur1("Connecteur",$e->getMessage());
           }
         
          
         
          //echo "dans ".__FUNCTION__ ; 
     }
     private function deconnecter() {
          session_start();
          unset($_SESSION['identifiant']);
          header('Location: admin');
          //echo "dans ".__FUNCTION__ ; 
     }
     
     private function getAuteurs() {
          $type = isset($_POST['type']) ?$_POST['type'] : 'auteur';
          $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
          $reqPDO = new RequetesPDO();
          $auteurs = $reqPDO->getAuteurs($type,$order);
          $vue = new Vue("AuteurAdmin", array('auteurs' => $auteurs));
          
          //echo "dans ".__FUNCTION__ ;
     }
     private function ajouterAuteur()   {
          if(isset($_POST['envoieAjouterAuteur'])){
               try{
                    if(!empty($_POST['ajouterAuteurNom'])&&!empty($_POST['ajouterAuteurPrenom'])){
                         $ajouterAuteurNom=$_POST['ajouterAuteurNom'];
                         $ajouterAuteurPrenom=$_POST['ajouterAuteurPrenom'];
                              
                         $reqPDO = new RequetesPDO();
                         $reqPDO->ajouterAuteur($ajouterAuteurNom,$ajouterAuteurPrenom);
                         $auteurs="";
                         $vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs)); 
                    }
                    else{
                         throw new exception ("vous devez saisir nom et le prenom .");
                         //$auteurs="";
                         //$vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs));
                    }     
     
               }
                catch (Exception $e) {
                         $this->erreur1("AjouterAuteur",$e->getMessage());
                        
               }

          }
          else{
               $auteurs="";
               $vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs));
          }
          
               
        
          
          //$auteurs="";
          //$vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs));
          
          //echo "dans ".__FUNCTION__ ; 
     }
     private function modifierAuteur()  {
          $_SESSION['modifierAuteurError']="";
          if(isset($_POST['envoieModifierAuteur'])){
               if(!empty($_POST['modifierAuteurNom'])&&!empty($_POST['modifierAuteurPrenom'])){
                    $modifierAuteurNom=$_POST['modifierAuteurNom'];
                    $modifierAuteurPrenom=$_POST['modifierAuteurPrenom'];
                    $id=$_POST['modifierAuteurID'];
                    $reqPDO = new RequetesPDO();
                    $reqPDO->modifierAuteur($modifierAuteurNom,$modifierAuteurPrenom,$id); 
                    //aller livre admin
                    $type = isset($_POST['type']) ?$_POST['type'] : 'auteur';
                    $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
                    $reqPDO = new RequetesPDO();
                    $auteurs = $reqPDO->getAuteurs($type,$order);
                    
                    $vue = new Vue("AuteurAdmin", array('auteurs' => $auteurs));     
               }
               else{
                    $_SESSION['modifierAuteurError']="veuillez entrer le nom, prename pour changer les informations d'auteurs"; 
                    $id=$_GET['id'];
                    $reqPDO = new RequetesPDO();
                    $auteurs = $reqPDO->getAuteurByID($id);
                    $vue = new Vue("ModifierAuteur", array('auteurs' => $auteurs)); 
               }

          }
          
          else{
               $id=$_GET['id'];
               $reqPDO = new RequetesPDO();
               $auteurs = $reqPDO->getAuteurByID($id);
               $vue = new Vue("ModifierAuteur", array('auteurs' => $auteurs)); 
          }     
          //echo "dans ".__FUNCTION__ ; 
     }
     private function supprimerAuteur() {
          if(isset($_GET['id'])){
               $id=$_GET['id'];
               $reqPDO = new RequetesPDO();
               $reqPDO->supprimerAuteur($id); 
               //aller livre admin
               $type = isset($_POST['type']) ?$_POST['type'] : 'annee';
               $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
               $reqPDO = new RequetesPDO();
               $auteurs = $reqPDO->getAuteurs($type,$order);
               $vue = new Vue("AuteurAdmin", array('auteurs' => $auteurs));  
          }
          else{
               echo "error de supprimer auteur";
          }

          //echo "dans ".__FUNCTION__ ; 
     }
     
     private function getLivres()      {
          $type = isset($_POST['type']) ?$_POST['type'] : 'annee';
        $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
        $reqPDO = new RequetesPDO();
        $livres = $reqPDO->getLivres($type,$order);
        $vue = new Vue("LivresAdmin", array('livres' => $livres));
     }
     private function ajouterLivre()   {

          $_SESSION['ajouterLiverError']="";
        //echo "dans ".__FUNCTION__ ; 
        if(isset($_POST['envoieAjouterLivre'])){
          try{
               if(!empty($_POST['ajouterLivreTitre'])&&!empty($_POST['ajouterLivreAnnee'])&&!empty($_POST['ajouterLivreAuteur'])){
                    $ajouterLivreTitre=$_POST['ajouterLivreTitre'];
                    $ajouterLivreAnnee=$_POST['ajouterLivreAnnee'];
                    $ajouterLivreAuteur=$_POST['ajouterLivreAuteur'];         
                    $reqPDO = new RequetesPDO();
                    $reqPDO->ajouterLivre($ajouterLivreTitre,$ajouterLivreAnnee,$ajouterLivreAuteur);
                    $reqPDO = new RequetesPDO();
                    $auteurs = $reqPDO->getAuteurInfo();
                    $vue = new Vue("AjouterLivre", array('auteurs' => $auteurs));

               }
               else{
                    throw new exception ("vous devez saisir titre,annee et auteur pour livre ");
                    //$auteurs="";
                    //$vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs));
               }     

          }
          catch (Exception $e) {
               $_SESSION['ajouterLiverError']=$e->getMessage();
               $reqPDO = new RequetesPDO();
               $auteurs = $reqPDO->getAuteurInfo();
               $vue = new Vue("AjouterLivre", array('auteurs' => $auteurs));

                    
                    
          }

        }
        else{
               $reqPDO = new RequetesPDO();
               $auteurs = $reqPDO->getAuteurInfo();
               $vue = new Vue("AjouterLivre", array('auteurs' => $auteurs));
        }
          
     }

     private function modifierLivre()  {

          $_SESSION['modifierLivreError']="";
          if(isset($_POST['envoieModifierLivre'])){
               if(!empty($_POST['modifierLivreTitre'])&&!empty($_POST['modifierLivreAnnee'])&&!empty($_POST['modifierLivreAuteur'])){
                    $modifierLivreTitre=$_POST['modifierLivreTitre'];
                    $modifierLivreAnnee=$_POST['modifierLivreAnnee'];
                    $modifierLivreAuteur=$_POST['modifierLivreAuteur'];
                    $id=$_POST['modifierLivreID'];
                    $reqPDO = new RequetesPDO();
                    $reqPDO->modifierLivre($modifierLivreTitre,$modifierLivreAnnee,$modifierLivreAuteur,$id); 
                    //aller livre admin
                    $type = isset($_POST['type']) ?$_POST['type'] : 'annee';
                    $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
                    $reqPDO = new RequetesPDO();
                    $livres = $reqPDO->getLivres($type,$order);
                    $vue = new Vue("LivresAdmin", array('livres' => $livres));      
               }
               else{
                    $_SESSION['modifierLivreError']="veuillez saisir l'année, le titre et le auteur pour changer les informations du livre";
                    $reqPDO = new RequetesPDO();
                    $auteurs = $reqPDO->getAuteurInfo();
                    $vue = new Vue("ModifierLivre", array('auteurs' => $auteurs)); 
               }
          }
          
          else{
               $reqPDO = new RequetesPDO();
               $auteurs = $reqPDO->getAuteurInfo();
               $vue = new Vue("ModifierLivre", array('auteurs' => $auteurs)); 
          }     
          //echo "dans ".__FUNCTION__ ; 
     
     }
     private function supprimerLivre() {
          if(isset($_GET['id'])){
               $id=$_GET['id'];
               $reqPDO = new RequetesPDO();
               $reqPDO->supprimerLivre($id); 
               //aller livre admin
               $type = isset($_POST['type']) ?$_POST['type'] : 'annee';
               $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
               $reqPDO = new RequetesPDO();
               $livres = $reqPDO->getLivres($type,$order);
               $vue = new Vue("LivresAdmin", array('livres' => $livres));  
          }
          else{
               echo "error de supprimer livre";
          }
         

          //echo "dans ".__FUNCTION__ ; 
     }
     
     private function getAdministrateurs()      {
          $type = isset($_POST['type']) ?$_POST['type'] : 'identifiant';
          $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
          $reqPDO = new RequetesPDO();
          $administrateurs = $reqPDO->getAdministrateurs($type,$order);
          $vue = new Vue("Admin", array('administrateurs' => $administrateurs));
          //echo "dans ".__FUNCTION__ ; 
     }
     private function ajouterAdministrateur()   {
      
          if(isset($_POST['envoie_ajouterAdmin'])){
               try{
                    if(!empty($_POST['ajouterIdentifiant'])&&!empty($_POST['ajouterMDP'])){
                         
                         $ajouterIdentifiant=$_POST['ajouterIdentifiant'];
                         $ajouterMDP=$_POST['ajouterMDP'];
                         if(strlen($ajouterIdentifiant)>=8&&strlen($ajouterMDP)>=8){
                              $reqPDO = new RequetesPDO();
                              $reqPDO->ajouterAdministrateur($ajouterIdentifiant,$ajouterMDP);  
                              $administrateurs="";
                              $vue = new Vue("AjouterAdmin", array('administrateurs' => $administrateurs));
                         }
                         else{
                              throw new exception ("L'identifiant et le mot de passe d'un administrateur doivent comporter au moins 8 caractères .");
                         }
                         
                    }
                    else{
                         throw new exception ("vous devez saisir Identifiant et le Mot de passe .");
                         //$auteurs="";
                         //$vue = new Vue("AjouterAuteur", array('auteurs' => $auteurs));
                    }     
     
               }
                catch (Exception $e) {
                     
                         $this->erreur1("AjouterAdmin",$e->getMessage());
                        
               }
          }
          else{
               $administrateurs="";
               $vue = new Vue("AjouterAdmin", array('administrateurs' => $administrateurs)); 
          } 
         
     }
     private function modifierAdministrateur()  {
          
          $_SESSION['modifierAdminError']="";
          if(isset($_POST['envoieModifierAdmin'])){
               if(!empty($_POST['modifierMDP'])&&!empty($_POST['modifierIdentifiant'])){

                    $modifierIdentifiant=$_POST['modifierIdentifiant'];
                    $modifierMDP=$_POST['modifierMDP'];
                    if(!empty($modifierIdentifiant)){
                         $id=$_POST['modifierAdministrateurID'];
                         $reqPDO = new RequetesPDO();
                         $reqPDO->modifierAdministrateur( $modifierIdentifiant,$modifierMDP,$id); 
                         //aller livre admin
                         $type = isset($_POST['type']) ?$_POST['type'] : 'mdp';
                         $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
                         $reqPDO = new RequetesPDO();
                         $administrateurs = $reqPDO->getAdministrateurs($type,$order);
                    
                         $vue = new Vue("Admin", array('administrateurs' => $administrateurs)); 
                    }
                        
               }
               else{
                    $_SESSION['modifierAdminError']="Ne peut pas laisser le formulaire vide!";
                    $id=$_GET['id'];
                    $reqPDO = new RequetesPDO();
                    $administrateurs = $reqPDO->getAdministrateurByID($id);
                    $vue = new Vue("ModifierAdmin", array('administrateurs' => $administrateurs)); 
               }

          }  
          else{
               $id=$_GET['id'];
               $reqPDO = new RequetesPDO();
               $administrateurs = $reqPDO->getAdministrateurByID($id);
               $vue = new Vue("ModifierAdmin", array('administrateurs' => $administrateurs)); 
          }     
          
          
          //echo "dans ".__FUNCTION__ ; 
          //echo "dans ".__FUNCTION__ ; 
     }
     private function supprimerAdministrateur() {
          if(isset($_GET['id'])){
               $id=$_GET['id'];
               $reqPDO = new RequetesPDO();
               $reqPDO->supprimerAdministrateur($id); 
               //aller livre admin
               $type = isset($_POST['type']) ?$_POST['type'] : 'mdp';
               $order = isset($_POST['order']) ?$_POST['order'] : 'ASC';
               $reqPDO = new RequetesPDO();
               $administrateurs = $reqPDO->getAdministrateurs($type,$order);
               $vue = new Vue("Admin", array('administrateurs' => $administrateurs));  
          }
          else{
               echo "error de supprimer auteur";
          }

          //echo "dans ".__FUNCTION__ ;
      }
     private function erreur1($vueItem,$msgErreur) {
          //$vue = new Vue("$display", array('msgErreur' => $msgErreur));
          $vue = new Vue("$vueItem", array('msgErreur' => $msgErreur), 'gabaritAdmin');
      }
}

