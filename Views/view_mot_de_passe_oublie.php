<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>

    <?php require_once('Layout/view_header.html') ?>
    
    <link href="Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css"/>
    <script src="Content/js/oeil_mot_de_passe.js" defer></script>
</head>
<body>

    <div class="centre">
        <h1>Mot de passe oublié ?</h1>
        <div class="input-group">
            <img src="../Content/images/email.png" alt="Email Icon" class="icon">
            <input type="email" placeholder="Votre adresse email" required>
        </div>
        <button class="btn">Réinitialiser mon mot de passe</button>
        <a href="view_connexion.php" class="link">Retour à la connexion</a>
    </div>

</body><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de Mot de Passe</title>
    <link href="css/Connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="centre">
        <h1>Changer mon mot de passe</h1>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Nouveau mot de passe" id="new-password" required>
            <i class="eye-icon fas fa-eye" onclick="togglePassword('new-password')"></i>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirmer le mot de passe" id="confirm-password" required>
            <i class="eye-icon fas fa-eye" onclick="togglePassword('confirm-password')"></i>
        </div>
        <button class="btn">Sauvegarder</button>
        <a href="connexion.php" class="link">Retour à la connexion</a>
    </div>
    
</body>
</html>

</html>
