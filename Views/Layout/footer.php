<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>

</head>
<body>
<footer>
    <ul class="logement">
        <li class="titre">Louer mon logement</li></a>
        <a href=#><li>Logement étudiant</li></a>
        <a href=#><li>Résidence étudiante</li></a>
        <a href=#><li>Colocation</li></a>
        <a href=#><li>Appartement</li></a>
        <a href=#><li>Studio</li></a>
        <a href=#><li>Chambre chez l’habitant</li></a>
    </ul>
    <ul class="etudiant">
        <li class="titre">Logement étudiant en France</li></a>
            <?php foreach ($villes as $ville): ?>
        <a href=#><li>Logement étudiant à <?php echo $ville['nom_ville']; ?></li></a>

         <?php endforeach;?>
    </ul>
    <ul class="aPropos">
        <li class="titre">À propos</li></a>
        <a href=#><li>Blog</li></a>
        <a href=#><li>Actualités</li></a>
        <a href=#><li>Écoles et universités partenaires</li></a>
        <a href=#><li>Mentions légales</li></a>
        <a href=#><li>CGU</li></a>
        <a href=#><li>FAQ</li></a>
    </ul>
    <div class="partDroite">
        <ul class="logo">
            <li class="titre"><img alt="AidAppart" src="Content/Images/AidAppart%20PNG.png"></li></a>
            <a href="?controller=connexion&action=connexionController"><li>Connexion</li></a>
            <a href=#><li>Espace propriétaire</li></a>
            <a href=#><li>Espace professionnel de </br> l’immobilier</li></a>
            <a href=#><li>Gérer les cookies</li></a>
        </ul>
        <ul class="reseaux">
            <a href=#><li><img alt="insta" src="Content/Images/footer/instagram.png"></li></a>
            <a href=#><li><img alt="facebook" src="Content/Images/footer/facebook.png"></li></a>
            <a href=#><li><img alt="X" src="Content/Images/footer/x.png"></li></a>
            <a href=#><li><img alt="Snapchat" src="Content/Images/footer/instagram.png"></li></a>
        </ul>
    </div>
    <div></div>
</footer>
</body>
</html>