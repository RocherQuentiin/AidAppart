<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/stylesheet.css"/>
    <link rel="stylesheet" href="Content/css/index.css"/>
    <link rel="stylesheet" href="Content/css/footer.css"/>
    <link rel="icon" href="Content/Images/logo.ico" type="image/x-icon">
</head>
<body>
    
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="?controller=accueil&action=accueilController" class="navbar-logo"><img src="Content/Images/AidAppart%20PNG.png" alt="Logo"></a>

        <!-- Toggle Button -->
        <button class="navbar-toggle" id="navbarToggle" aria-label="Menu">
            ☰
        </button>

        <!-- Navbar Links -->
        <div class="navbar-menu" id="navbarMenu">
            <ul class="navbar-links">
                <li><a href="?controller=aide&action=aideController">Aides</a></li>
                <li><a href="?controller=pagelogement&action=pagelogementController">Locations</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
            <div class="navbar-right">
                <?php 
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['prenom'])): ?>
                    <a href="?controller=deconnexion&action=deconnexionController" class="btn-account"><button class="button">Déconnexion</button></a>
                    <a href="?controller=user&action=userController" class="icon-translate">
                        <img src="Content/Images/Accueil/profile.png" alt="Traduire" title="Traduire">
                <?php else: ?>
                    <a href="?controller=connexion&action=connexionController" class="btn-account"><button class="button">Connexion</button></a>
                    <a href="?controller=connexion&action=connexionController" class="icon-translate">
                        <img src="Content/Images/Accueil/profile.png" alt="Traduire" title="Traduire">
                <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('navbarToggle').addEventListener('click', function() {
        const menu = document.getElementById('navbarMenu');
        menu.classList.toggle('active');
        console.log('Toggle button clicked');

    });

</script>

</body>
</html>
