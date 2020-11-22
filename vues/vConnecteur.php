<?php $this->titre = "Connexion administrateur"; ?>

<form method="post" action="">
Identifiant: <input name="identifiant" type="text" required>
Mot de passe : <input name="mdp" type="password" required> 
    
    <input type="submit" value="envoyer" name="envoie">
</form>
<?php $this->titre = "Page de connecteur"; ?>
<p class="erreur"> <?php if(isset($msgErreur)) {echo $msgErreur;} ?></p>
<?php
