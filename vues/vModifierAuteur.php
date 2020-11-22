<?php $this->titre = "Modifier le auteur"; ?>
<h4>Modifier le auteur</h4>

<form method="post" action="">
    ID Auteur:
    <p><input type="text" name="modifierAuteurID" value="<?php echo $auteurs[0]['id_auteur'] ?>" readonly></p>
    Nom:
    <p><input type="text" name="modifierAuteurNom" value="<?php echo $auteurs[0]['nom'] ?>" ></p>
    Prénom:
    <p><input type="text" name="modifierAuteurPrenom" value="<?php echo $auteurs[0]['prenom'] ?>"></p>
    
    <p><input type="submit" value="Envoyer" name="envoieModifierAuteur"></p>
</form>
<?php if(!empty($_SESSION['modifierAuteurError'])):?>
<p class="erreur">Une erreur est survenue : <?php $msgErreur=$_SESSION['modifierAuteurError'];echo $msgErreur; ?></p>
<?php endif?>