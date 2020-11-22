<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/styles/styles.css">
    <title><?php echo $titre ?></title>
</head>
<body>
    <div id="global">
        <header>
        
            <div id="title">
            <h1>Administration de la bibliothèque</h1>
                <ul>
                    
                    <li>Français</li>
                    <li><a href="admin?action=deconnecter">Déconnexion</a> </li>
                    <li><?php if(isset($_SESSION['identifiant'])) echo ($_SESSION['identifiant']) ?></li>
                </ul>
            </div>

            <ul>
                <li><a class="<?php echo $this->vue === "Administrateurs" ? "active" : ""; ?>"
                       href="admin?item=administrateur">Administrateurs</a></li>
                <li><a class="<?php echo $this->vue === "Auteurs" ? "active" : ""; ?>"
                       href="admin?item=auteur">Auteurs</a></li>
                <li><a class="<?php echo $this->vue === "Livres" ? "active" : ""; ?>"
                       href="admin?item=livre">Livres</a></li>
            </ul>
        </header>
        <div id="contenu">
            <?php echo $contenu ?> <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>