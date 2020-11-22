<?php $this->titre = "Liste des Administrateur"; ?>
<form method="post" action="">
    Trier Par: 
    <select name="type">
        <option value="id_administrateur">ID Administrateur</option>
        <option value="identifiant">Identifiant</option>
        <option value="mdp">Mot de passe</option>
        
    </select>
    ordre : 
    <select name="order">
        <option value="desc">Descendant</option>
        <option value="asc">Ascendant</option>
        
    </select>
    <input type="submit" value="Executer le tri" name="envoie">
</form>
<a href="admin?item=administrateur&action=ajouter">Ajouter Administrateur</a>
<table>
    <tr>
        <th>id Administrateur</th>
        <th>Identifiant</th>
        <th>Mot de passe</th>    
        <th>Actions</th>
        <th></th>
    </tr>

<?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees ?>

<?php foreach ($administrateurs as $administrateur): // variable $auteurs provenant de la fonction extract($donnees) ?>
    <?php //print_r($auteur) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $administrateur['id_administrateur'] ?></td>
        <td><?php echo $administrateur['identifiant'] ?></td>
        <td><?php echo $administrateur['mdp'] ?></td>
        
        <td><a  href="admin?item=administrateur&action=modifier&id=<?php echo $administrateur['id_administrateur'] ?>">Modifier</a></td>
        <td><a href="admin?item=administrateur&action=supprimer&id=<?php echo $administrateur['id_administrateur'] ?>">Supprimer</a></td>
    </tr>

<?php endforeach; ?>
</table>