<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="Content/css/user.css">
    <script src="Content/js/user.js" defer></script>
</head>
<body>

<?php include 'Layout/view_header.php'; ?>

<h1></h1>

<div class="container">
    
    <h1>Mon Profil</h1>

    <!-- Bouton pour afficher/masquer le formulaire de mise à jour -->
    <button id="editButton">Modifier</button>

    <!-- Formulaire de mise à jour des informations utilisateur -->
    <div id="updateForm" style="display: none;">
        <form action="?controller=user&action=update" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="emailInput" name="email" required><br>

            <label for="nom">Nom:</label>
            <input type="text" id="nomInput" name="nom" required><br>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenomInput" name="prenom" required><br>

            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephoneInput" name="telephone" required><br><br>

            <button type="submit">Mettre à jour</button>
        </form>
    </div>

    <!-- Affichage des informations de l'utilisateur -->
    <div id="profileInfo">
        <p><strong>Nom :</strong> <span id="nomText"><?php echo htmlspecialchars($nom); ?></span></p>
        <p><strong>Prénom :</strong> <span id="prenomText"><?php echo htmlspecialchars($prenom); ?></span></p>
        <p><strong>Email :</strong> <span id="emailText"><?php echo htmlspecialchars($email); ?></span></p>
        <p><strong>Téléphone :</strong> <span id="telephoneText"><?php echo htmlspecialchars($telephone); ?></span></p>
    </div>

    <!-- Formulaire de désactivation du compte -->
    <form method="POST" action="?controller=user&action=desactivateUser">
        <button type="submit" name="deactivate_account" class="button-danger">Désactiver mon compte</button>
    </form>

    <h2>Mes Logements</h2>

    <!-- Liste des logements -->
    <ul>
        <?php if (!empty($logements)): ?>
            <?php foreach ($logements as $logement): ?>
                <li>
                    <strong><?php echo htmlspecialchars($logement['type']); ?></strong>
                    - <?php echo htmlspecialchars($logement['surface']); ?>m²
                    - <?php echo htmlspecialchars($logement['charges']); ?>$
                    - <?php echo htmlspecialchars($logement['proprietaire']); ?>$
                    - <?php echo htmlspecialchars($logement['loyer']); ?>$
                    - <?php echo htmlspecialchars($logement['charges']); ?>$
                    - <?php echo htmlspecialchars($logement['creer_a']); ?>$
                    - <?php echo htmlspecialchars($logement['adresse']); ?>$
                    - <?php echo htmlspecialchars($logement['est_meuble']); ?>$
                    - <?php echo htmlspecialchars($logement['est_accessible_PMR']); ?>$
                    - <?php echo htmlspecialchars($logement['nb_pieces']); ?>$
                    - <?php echo htmlspecialchars($logement['a_parking']); ?>$
                    - <?php echo htmlspecialchars($logement['description']); ?>$
                     <form method="POST" action="?controller=user&action=supprimerLogement">
                        <input type="hidden" name="logement_id" value="<?php echo htmlspecialchars($logement['id']); ?>">
                        <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?');">Supprimer le logement</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun logement créé.</p>
        <?php endif; ?>
    </ul>
</div>

<?php include 'Layout/footer.php'; ?>
</body>
</html>
