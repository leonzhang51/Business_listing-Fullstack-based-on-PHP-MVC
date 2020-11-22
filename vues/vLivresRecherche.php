<?php $this->titre = "Recherche le livre"; ?>

<form method="post" action="">
    Année: <input name="annee" type="number" >
    Le titre contient : <input name="titre" type="text" > 
    <input type="submit" value="Lancer la recherche" name="envoie" >
</form>
<?php $this->titre = "Page d'erreur"; ?>
<p class="erreur"> <?php if(isset($msgErreur)) {echo $msgErreur;} ?></p>
<?php

$tag="";
if(isset($livres)){
    foreach ($livres as $livre){
        if(isset($livre['annee'])){
            $tag=$livre['annee'];
            
        }
    }  
}


if($tag!=""): ?>
<?echo "tag is $tag";?>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
    </tr>

<?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees ?>

<?php foreach ($livres as $livre): // variable $livres provenant de la fonction extract($donnees) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $livre['titre'] ?></td>
        <td><?php echo $livre['auteur'] ?></td>
        <td><?php echo $livre['annee'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>


