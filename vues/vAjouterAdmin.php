<?php $this->titre = "Ajouter le administrateur"; ?>
<h4>Ajouter le administrateur</h4>
<form method="post" action="">
    Identifiant:
    <p><input type="text" name="ajouterIdentifiant" ></p>
    Mot De Passe:
    <p><input type="text" name="ajouterMDP" ></p>
   
    <p><input type="submit" value="Envoyer" name="envoie_ajouterAdmin"></p>
</form>
<?php if(isset($msgErreur)):?>
<p class="erreur">Une erreur est survenue : <?= $msgErreur ?></p>
<?php endif?>