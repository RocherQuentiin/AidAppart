<?php
require_once __DIR__ . '/../controller_connexion.php'; // Inclut le contrôleur
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
<<<<<<< HEAD
    <link href="../Content/css/connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="../Content/css/index.css"/>
=======
    <link href="Content/css/Connexion.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
>>>>>>> remotes/origin/pre_main
</head>
<body>

    <div class="centre">
        <h1>JE ME CONNECTE</h1>
<<<<<<< HEAD
=======
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
        <a href="Views/view_inscription.php" class="link">Première connexion ? Je crée un compte AidAppart</a>
        <a href="view_mot_de_passe_oublie.php" class="link">Mot de passe oublié ?</a>

        <!-- Bouton -->
        <button class="button">Me Connecter</button>
    </div>
>>>>>>> remotes/origin/pre_main

        <!-- Affiche un message d'erreur s'il existe -->
        <?php if ($message): ?>
            <p style="color: red;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form method="POST" action="">
            <!-- Groupe de champs email -->
            <div class="input-group">
                <img src="../Content/images/email.png" alt="Email Icon" class="icon">
                <input type="email" name="email" placeholder="Votre adresse email" required>
            </div>

            <!-- Groupe de champs mot de passe -->
            <div class="input-group">
                <img src="../Content/images/cadenas.png" alt="Lock Icon" class="icon">
                <input type="password" name="mot_de_passe" placeholder="Votre mot de passe" id="password" required>
                <img src="../Content/images/eye_icon.png" alt="Eye Icon" class="eye-icon" id="eye-toggle" onclick="togglePassword()">
            </div>

            <!-- Liens -->
   
