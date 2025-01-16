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
    <!-- update_personne_form.php -->

  <!-- Bouton pour afficher/masquer le formulaire -->
  <button id="editButton">Modifier</button>

  <!-- Formulaire de mise à jour -->
  <div id="updateForm" style="display: none;">
      <form action="?controller=user&action=update" method="POST">
          <label for="email">Email:</label>
          <input type="email" id="emailInput" name="email" required><br>

          <label for="nom">Nom:</label>
          <input type="text" id="nomInput" name="nom" required><br>

          <label for="prenom">Prénom:</label>
          <input type="text" id="prenomInput" name="prenom" required><br>

          <label for="telephone">Téléphone:</label>
          <input type="text" id="telephoneInput" name="telephone" required><br>

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

  <script>
      document.getElementById('editButton').addEventListener('click', function() {
          var updateForm = document.getElementById('updateForm');
          var profileInfo = document.getElementById('profileInfo');

          if (updateForm.style.display === 'none') {
              // Remplir les champs du formulaire avec les valeurs actuelles de l'utilisateur
              document.getElementById('emailInput').value = document.getElementById('emailText').textContent;
              document.getElementById('nomInput').value = document.getElementById('nomText').textContent;
              document.getElementById('prenomInput').value = document.getElementById('prenomText').textContent;
              document.getElementById('telephoneInput').value = document.getElementById('telephoneText').textContent;

              // Afficher le formulaire et masquer les informations de profil
              updateForm.style.display = 'block';
              profileInfo.style.display = 'none';
          } else {
              // Masquer le formulaire et afficher les informations de profil
              updateForm.style.display = 'none';
              profileInfo.style.display = 'block';
          }
      });
  </script>



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
