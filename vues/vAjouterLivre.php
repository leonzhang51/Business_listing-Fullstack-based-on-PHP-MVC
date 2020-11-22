<?php $this->titre = "Ajouter le livre"; ?>
<form method="post" action="">
    Titre:
    <p><input type="text" name="ajouterLivreTitre" ></p>
    Année:
    <p><input type="number" name="ajouterLivreAnnee" ></p>
    Auteur:
    <p>
    <select name="ajouterLivreAuteur">
    <?php foreach ($auteurs as $auteur): // variable $livres provenant de la fonction extract($donnees) ?>
        <option value="<?php echo $auteur['id'] ?>"><?php echo $auteur['nom'] ?></option>
    <?php endforeach; ?>
    
    </select>
    </p>
    <p><input type="submit" value="Envoyer" name="envoieAjouterLivre"></p>
</form>
<?php if(!empty($_SESSION['ajouterLiverError'])):?>
<p class="erreur">Une erreur est survenue : <?php $msgErreur=$_SESSION['ajouterLiverError'];echo $msgErreur; ?></p>
<?php endif?>