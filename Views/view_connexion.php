<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../content/css/Connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
 
    <div class="centre">
        <h1>JE ME CONNECTE</h1>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Votre adresse email" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Votre mot de passe" id="password" required>
            <i class="eye-icon fas fa-eye" onclick="togglePassword()"></i>
        </div>
        <a href="view_inscription.php" class="link">Première connexion ? Je crée un compte AidAppart</a>
        <a href="view_mot_de_passe_oublie.php" class="link">Mot de passe oublié ?</a>
        
        <button class="btn">Me Connecter</button>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.eye-icon');
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