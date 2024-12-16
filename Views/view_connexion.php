
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link href="../Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="../Content/css/index.css"/>
</head>
<body>

    <div class="centre">
        <h1>JE ME CONNECTE</h1>

        <!-- Groupe de champs email -->
        <div class="input-group">
            <img src="../Content/images/email.png" alt="Email Icon" class="icon">
            <input type="email" placeholder="Votre adresse email" required>
        </div>

        <!-- Groupe de champs mot de passe -->
        <div class="input-group">
            <img src="../Content/images/cadenas.png" alt="Lock Icon" class="icon">
            <input type="password" placeholder="Votre mot de passe" id="password" required>
            <img src="../Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle" onclick="togglePassword()">
        </div>

        <!-- Liens -->
        <a href="?controller=inscription&action=Controller_inscription" class="link">Première connexion ? Je crée un compte AidAppart</a>
        <a href="view_mot_de_passe_oublie.php" class="link">Mot de passe oublié ?</a>

        <!-- Bouton -->
        <button class="button">Me Connecter</button>
    </div>

    <!-- Script pour basculer la visibilité du mot de passe -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-toggle');
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
