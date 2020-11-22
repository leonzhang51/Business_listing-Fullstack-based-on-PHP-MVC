<?php $this->titre = "Modifier le administrateur"; ?>
<h4>Modifier le administrateur</h4>

<form method="post" action="">
    ID Auteur:
    <p><input type="text" name="modifierAdministrateurID" value="<?php echo $administrateurs[0]['id_administrateur'] ?>" readonly></p>
    Identifiant:
    <p><input type="text" name="modifierIdentifiant" value="<?php echo $administrateurs[0]['identifiant'] ?>" ></p>
    Mot de Passe:
    <p><input type="text" name="modifierMDP" value="<?php echo $administrateurs[0]['mdp'] ?>" ></p>
    
    <p><input type="submit" value="Envoyer" name="envoieModifierAdmin"></p>
</form>
<?php if(!empty($_SESSION['modifierAdminError'])):?>
<p class="erreur">Une erreur est survenue : <?php $msgErreur=$_SESSION['modifierAdminError'];echo $msgErreur; ?></p>
<?php endif?>