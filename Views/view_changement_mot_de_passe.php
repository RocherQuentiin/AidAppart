<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>

    <?php require_once('Layout/view_header.html') ?>
    
    <link href="Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css"/>
</head>
<body>
    <div class="centre">
        <h1>Changer mon mot de passe</h1>

        <!-- Groupe de champs nouveau mot de passe -->
        <div class="input-group">
            <img src="../Content/images/cadenas.png" alt="Lock Icon" class="icon">
            <input type="password" placeholder="Nouveau mot de passe" id="new-password" required>
            <img src="../Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle-new" onclick="togglePassword('new-password', 'eye-toggle-new')">
        </div>

        <!-- Groupe de champs confirmer le mot de passe -->
        <div class="input-group">
            <img src="../Content/images/cadenas.png" alt="Lock Icon" class="icon">
            <input type="password" placeholder="Confirmer le mot de passe" id="confirm-password" required>
            <img src="../Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle-confirm" onclick="togglePassword('confirm-password', 'eye-toggle-confirm')">
        </div>

        <!-- Bouton de sauvegarde -->
        <button class="button">Sauvegarder</button>

        <!-- Lien retour à la connexion -->
        <a href="view_connexion.php" class="link">Retour à la connexion</a>
    </div>

    <!-- Script pour basculer la visibilité du mot de passe -->
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.src = "../Content/images/eye_closed_icon.png"; // Change to eye closed
            } else {
                passwordInput.type = 'password';
                eyeIcon.src = "../Content/images/eye_icon.png"; // Change back to eye open
            }
        }
    </script>
</body>
</html>
