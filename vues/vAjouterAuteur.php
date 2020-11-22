<?php $this->titre = "Ajouter le auteur"; ?>
<h4>Ajouter le auteur</h4>
<form method="post" action="">
    nom:
    <p><input type="text" name="ajouterAuteurNom" ></p>
    Prénom:
    <p><input type="text" name="ajouterAuteurPrenom" required></p>
   
    <p><input type="submit" value="Envoyer" name="envoieAjouterAuteur"></p>
</form>
<?php if(isset($msgErreur)):?>
<p class="erreur">Une erreur est survenue : <?= $msgErreur ?></p>
<?php endif?>