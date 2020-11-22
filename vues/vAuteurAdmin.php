<?php $this->titre = "Liste des auteurs"; ?>
<form method="post" action="">
    Trier Par: 
    <select name="type">
        <option value="id_auteur">ID auteur</option>
        <option value="Nb_livres">Nb_livres</option>
        <option value="auteur">Auteur</option>
        
    </select>
    Le titre contient : 
    <select name="order">
        <option value="desc">Descendant</option>
        <option value="asc">Ascendant</option>
        
    </select>
    <input type="submit" value="Executer le tri" name="envoie">
</form>
<a href="admin?item=auteur&action=ajouter">Ajouter Auteur</a>
<table>
    <tr>
        <th>id auteur</th>
        <th>Auteur</th>
        <th>NB_livres</th>    
        <th>Actions</th>
        <th></th>
    </tr>

<?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees ?>

<?php foreach ($auteurs as $auteur): // variable $auteurs provenant de la fonction extract($donnees) ?>
    <?php //print_r($auteur) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $auteur['id_auteur'] ?></td>
        <td><?php echo $auteur['auteur'] ?></td>
        <td><?php echo $auteur['Nb_livres'] ?></td>
        
        <td><a  href="admin?item=auteur&action=modifier&id=<?php echo $auteur['id_auteur'] ?>&auteur=<?php echo $auteur['auteur'] ?>">Modifier</a></td>
        <td><a href="admin?item=auteur&action=supprimer&id=<?php echo $auteur['id_auteur'] ?>">Supprimer</a></td>
    </tr>

<?php endforeach; ?>
</table>