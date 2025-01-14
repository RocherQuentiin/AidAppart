<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>

    <?php require_once('Layout/view_header.html') ?>

    <link href="Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css"/>
    <script src="Content/js/oeil_mot_de_passe.js" defer></script>
</head>
<body>
    <div class="centre">
        <h1>Changer mon mot de passe</h1>

        <!-- Formulaire de changement de mot de passe -->
        <form method="POST" action="Controller_mdp_oublie.php?action=changer_mdp">
            
            <!-- Groupe de champs nouveau mot de passe -->
            <div class="input-group">
                <img src="Content/images/cadenas.png" alt="Lock Icon" class="icon">
                <input type="password" name="new_password" placeholder="Nouveau mot de passe" id="new_password" required>
                <img src="Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle" onclick="togglePassword('new_password')">
            </div>

            <!-- Groupe de champs confirmer le mot de passe -->
            <div class="input-group">
                <img src="Content/images/cadenas.png" alt="Lock Icon" class="icon">
                <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" id="confirm_password" required>
                <img src="Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle" onclick="togglePassword('confirm_password')">
            </div>

            <!-- Bouton de sauvegarde -->
            <button type="submit" class="button">Sauvegarder</button>

        </form>

        <!-- Lien retour à la connexion -->
        <a href="view_connexion.php" class="link">Retour à la connexion</a>

    </div>

    <?php include 'Layout/footer.html'; ?>
</body>
</html>
