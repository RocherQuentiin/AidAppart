<!DOCTYPE html>
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
        <a href="connexion.html" class="link">Retour à la connexion</a>
    </div>

    <script>
        function togglePassword(id) {
            const passwordInput = document.getElementById(id);
            const eyeIcon = passwordInput.nextElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
