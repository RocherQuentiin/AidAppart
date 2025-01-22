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
        <p><strong>Nom :</strong> <span id="nomText"><?= htmlspecialchars($nom); ?></span></p>
        <p><strong>Prénom :</strong> <span id="prenomText"><?= htmlspecialchars($prenom); ?></span></p>
        <p><strong>Email :</strong> <span id="emailText"><?= htmlspecialchars($email); ?></span></p>
        <p><strong>Téléphone :</strong> <span id="telephoneText"><?= htmlspecialchars($telephone); ?></span></p>
    </div>

    <!-- Formulaire de désactivation du compte -->
    <form method="POST" action="?controller=user&action=desactivateUser">
        <button type="submit" name="deactivate_account" class="button-danger">Désactiver mon compte</button>
    </form>

    <h2>Mes Logements</h2>

    <!-- Liste des logements -->
        <div class="listings">
        <?php if (!empty($logements)):
            foreach ($logements as $logement): ?>
            <div class="listing">
                <a href="?controller=annonces&action=annonces&id=<?= htmlspecialchars($logement['id']); ?>">
                    <img src="Content/Images/Proprio_<?= htmlspecialchars($logement['proprietaire']); ?>/Logement_<?= htmlspecialchars($logement['id']); ?>/image_vitrine.png" alt="Image du logement">
                    <p>Type: <?= htmlspecialchars($logement['type']); ?></p>
                    <p>Loyer: <?= htmlspecialchars($logement['loyer']); ?> €</p>
                    <p>Charges: <?= htmlspecialchars($logement['charges']); ?> €</p>
                    <p>Adresse: <?= htmlspecialchars($logement['adresse']); ?></p>
                    <?= $logement['est_meuble'] ? '<p>Meublé</p>' : '' ?>
                </a>
                <form class="supp_logement" method="POST" action="?controller=user&action=supprimerLogement">
                    <input type="hidden" name="logement_id" value="<?= htmlspecialchars($logement['id']); ?>">
                    <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?');">Supprimer le logement</button>
                </form>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun logement créé.</p>
        <?php endif; ?>
        </div>

    <h2>Mes Conversations</h2>

    <!-- Affichage des conversations -->
    <?php if (empty($messages)): ?>
        <p>Vous n'avez aucune conversation.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($messages as $message): ?>
                <li class="conversation-item">
                    <div class="conversation-header">
                        <strong>
                            <?php
                                // Afficher "Message envoyé à" ou "Message envoyé par" en fonction de l'expéditeur
                                if ($message['id_personne'] == $_SESSION['idpersonne']) {
                                    echo "Message envoyé à : " . htmlspecialchars($message['destinataire']['nom'] . ' ' . $message['destinataire']['prénom']);
                                } else {
                                    echo "Message envoyé par : " . htmlspecialchars($message['expediteur']['nom'] . ' ' . $message['expediteur']['prénom']);
                                }
                            ?>
                        </strong>
                    </div>
                    <div class="conversation-body">
                        <p><strong>Message :</strong> <?= htmlspecialchars($message['message']); ?></p>
                        <span class="message-date">Date d'envoi : <?= htmlspecialchars($message['creer_a']); ?></span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>

<?php include 'Layout/footer.php'; ?>
</body>
</html>
