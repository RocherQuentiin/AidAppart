<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <?php require_once('Layout/view_header.html') ?>
    
    <link href="Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css"/>
    <script src="Content/js/oeil_mot_de_passe.js" defer></script>
</head>
<body>
    <div class="centre">
        <h1>JE ME CONNECTE</h1>

        <form action="Controllers/controller_connexion.php" method="POST">
            <!-- Groupe de champs email -->
            <div class="input-group">
                <img src="Content/images/email.png" alt="Email Icon" class="icon">
                <input type="email" name="email" placeholder="Votre adresse email" required>
            </div>

            <!-- Groupe de champs mot de passe -->
            <div class="input-group">
                <img src="Content/images/cadenas.png" alt="Lock Icon" class="icon">
                <input type="password" name="password" placeholder="Votre mot de passe" id="password" required>
                <img src="Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle" onclick="togglePassword()">
            </div>

            <!-- Liens -->
            <div class="links">
                <a href="view_inscription.php" class="link">Première connexion ? Je crée un compte AidAppart</a>
                <a href="view_mot_de_passe_oublie.php" class="link">Mot de passe oublié ?</a>
            </div>

            <!-- Bouton -->
            <button type="submit" class="button">Me Connecter</button>
        </form>
    </div>

    <?php include 'Layout/footer.html'; ?>
</body>
</html>
