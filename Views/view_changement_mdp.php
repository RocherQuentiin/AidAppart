<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer mon mot de passe</title>

    <!-- Fichiers CSS et JavaScript -->
    <?php require_once('Layout/view_header.html'); ?>
    <link href="Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css">
    <script src="Content/js/pageinscription_connexion.js" defer></script>
</head>
<body>
    <div class="centre">
        <!-- Titre principal -->
        <h1>Changer mon mot de passe</h1>

        <!-- Formulaire de changement de mot de passe -->
        <form action="?controller=changement_mdp&action=changer_mdp" method="POST">

            <!-- Groupe de champs mot de passe -->
            <div class="input-group">
                <img src="Content/images/cadenas.png" alt="Lock Icon" class="icon" id="icon-lock">
                <input type="password" id="password1" name="mdp" placeholder="Votre nouveau mot de passe" >
                <img src="Content/images/eye_icon.png" alt="Eye Icon" class="icon" id="eye-toggle" onclick="togglePassword('password1')">
                </div>
                <div class="input-group">
                <img src="Content/images/cadenas.png" alt="Lock Icon" class="icon" id="icon-lock">
                <input type="password" id="password2" name="mdp_confirmation" placeholder="Confirmation">
                <img src="Content/images/eye_icon.png" alt="Eye Icon" class="icon" id="eye-toggle" onclick="togglePassword('password2')">
            </div>


            <!-- Bouton -->
            <button type="submit" class="button">Valider mon nouveau mot de passe</button>
        </form>

        <!-- Lien retour à la connexion -->
        <a href="?controller=connexion&action=connexionController" class="link">Retour à la connexion</a>
    </div>

    <!-- Footer -->
    <?php include 'Layout/footer.html'; ?>
</body>
</html>
