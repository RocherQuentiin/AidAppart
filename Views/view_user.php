<?php
// On récupère les données passées depuis le contrôleur
$user = $data['user'];
$logements = $data['logements'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Mon Profil</h1>

    <!-- Affichage des informations de l'utilisateur -->
    <div class="profile-info">
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($nom); ?></p>
        <p><strong>Prénom :</strong> <?php echo htmlspecialchars($prenom); ?></p>
        <p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($telephone); ?></p>
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
                  <form method="POST" action="?controller=user&action=supprimerLogement">
                      <!-- Champ caché pour l'ID du logement -->
                      <input type="hidden" name="logement_id" value="<?php echo htmlspecialchars($logement['id']); ?>">
                      - <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?');">Supprimer le logement</button>
                  </form>
              </li>
          <?php endforeach; ?>
      <?php else: ?>
          <p>Aucun logement créé.</p>
      <?php endif; ?>
   </ul>



</div>

</body>
</html>
