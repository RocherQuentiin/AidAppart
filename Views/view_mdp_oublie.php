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
    <script src="Content/js/pop_up.js" defer></script>
</head>

<body>

<div class="centre">
        <h1>Mot de passe oublié</h1>

        <h3>Un lien pour changer votre mot de passe va vous être envoyé.</h3>


        <form action="?controller=mdp_oublie&action=reset_mdp" method="POST">
            <!-- Groupe de champs email -->
            <div class="input-group">
                <img src="Content/images/email.png" alt="Email Icon" class="icon">
                <input type="email" name="email" placeholder="Adresse email" required>
            </div>
            <!-- Liens -->
            <div class="links">
                <a href="?controller=inscription&action=inscriptionController" class="link">Première connexion ? Je crée un compte AidAppart</a>
                <a href="?controller=connexion&action=connexionController" class="link">Retour à la connexion</a>
            </div>

            <!-- Bouton -->
            <button type="submit" class="button">Envoyer email</button>
        </form>
    </div>

    <?php 
        // Condition pour afficher le pop-up en fonction du message de succès ou d'erreur
        if (isset($data['success'])):
            echo "<script>showModal('" . $data['success'] . "', 'success');</script>";
        elseif (isset($data['erreur'])):
            echo "<script>showModal('" . $data['erreur'] . "', 'error');</script>";
        endif;

        include 'Layout/footer.html'; 
    ?>
</html>
