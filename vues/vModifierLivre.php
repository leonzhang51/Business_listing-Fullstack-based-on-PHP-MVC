<?php $this->titre = "Modifier le livre"; ?>
<form method="post" action="">
    Livre ID:
    <p><input type="text" name="modifierLivreID" value="<?php echo $_GET['id'] ?>" readonly></p>
    Titre:
    <p><input type="text" name="modifierLivreTitre" value="<?php echo $_GET['titre'] ?>" ></p>
    Année:
    <p><input type="text" name="modifierLivreAnnee" value="<?php echo $_GET['annee'] ?>" required></p>
    Auteur:
    <p>
    <select name="modifierLivreAuteur">
    <?php foreach ($auteurs as $auteur): // variable $livres provenant de la fonction extract($donnees) ?>
        <option value="<?php echo $auteur['id'] ?>"><?php echo $auteur['nom'] ?></option>
    <?php endforeach; ?>
    
    </select>
    </p>
    <p><input type="submit" value="Envoyer" name="envoieModifierLivre"></p>
</form>
<?php if(!empty($_SESSION['modifierLivreError'])):?>
<p class="erreur">Une erreur est survenue : <?php $msgErreur=$_SESSION['modifierLivreError'];echo $msgErreur; ?></p>
<?php endif?>