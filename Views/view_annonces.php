<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartment Listing</title>
  <link rel="stylesheet" href="Content/css/css_annonce.css">
</head>
<body>

  <?php include 'Layout/view_header.php'; 
    if(isset($_SESSION['idpersonne'])) {?>
    <script>
        window.userId = <?php echo $_SESSION['idpersonne']; ?>;
    </script>
    <?php } ?>

  <div class="container-annonce">
    <div class="image-gallery">
      <?php
      function imageExists($path) {
        return file_exists($path);
      }

      $imagePaths = [
        "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_vitrine.png",
        "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_2.png",
        "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_3.png",
        "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_4.png"
      ];

      foreach ($imagePaths as $path) {
        $imgSrc = imageExists($path) ? $path : "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_vitrine.png";
        echo "<img src=\"$imgSrc\" alt=\"Image\">";
      }
      ?>
      <button id="show-more" class="show-more">+ Voir plus</button>
      </div>

      <div id="image-modal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
        <div class="modal-images">
          <?php
          foreach ($imagePaths as $path) {
            $imgSrc = imageExists($path) ? $path : "Content/Images/Proprio_{$data["annonces"]["proprietaire"]}/Logement_{$data["id_annonces"]}/image_vitrine.png";
            echo "<img src=\"$imgSrc\" alt=\"Image\">";
          }
          ?>
        </div>
        </div>
      </div>
  </div>

  <aside class="details">
    <h2>À partir de <strong><?php echo htmlspecialchars($data["annonces"]['loyer']); ?> € / mois </strong></h2>
      <p><strong>Charges : </strong><?php echo htmlspecialchars($data["annonces"]['charges']); ?> € / mois</p>
      <p><strong>Surface : </strong><?php echo htmlspecialchars($data["annonces"]['surface']); ?> m2 </p>
      <p><strong>Adresse : </strong><?php echo htmlspecialchars($data["annonces"]['adresse']); ?></p>
      <p><strong>Pièces : </strong><?php echo htmlspecialchars($data["annonces"]['nb_pieces']); ?> pièces </p>
      <p><strong>Meublé : </strong><?php echo htmlspecialchars($data["annonces"]['est_meuble']); ?></p>
      <p><strong>Accessible aux PMR : </strong><?php echo htmlspecialchars($data["annonces"]['est_accessible_PMR']); ?></p>
      <p><strong>WIFI : </strong><?php echo htmlspecialchars($data["annonces"]['a_WIFI']); ?></p>
      <p><strong>Parking : </strong><?php echo htmlspecialchars($data["annonces"]['a_parking']); ?></p></br>
      <button id="show-more-ch" class="show-more-ch">Voir les chambres</button>
      <button title="signaler" class="report-button " onclick="reportLogement(<?php echo $data["id_annonces"]; ?>)">Signaler</button>
  </aside>
</div>

  <section class="description">
    <h2>Description du logement</h2>
    <p><?php echo htmlspecialchars($data["annonces"]['description']); ?></p>
  </section>

  <section class="location">
    <h2>Voir l'emplacement</h2>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.5263202364767!2d1.3570190155071896!3d43.61582257912245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aea3a4a4f7e1b1%3A0x74f80760b48a5a59!2sAppart&#39;City%20Toulouse%20A%C3%A9roport%20Cornebarrieu!5e0!3m2!1sen!2sfr!4v1635154872891!5m2!1sen!2sfr"
      width="100%"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
    ></iframe>
  </section>

  <section class="contact">
        <h2>Contactez le propriétaire</h2>
        <form id="messageForm" action='?controller=annonces&action=envoyerMessage&id=<?= $_GET['id'] ?>' method="post">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Votre message au propriétaire" rows="5" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>

  <section class="contact">
    <h2>Donne ton avis</h2>
    <form>
      <label for="message">Avis:</label>
      <textarea id="message" placeholder="Votre avis sur ce logement" rows="8" required></textarea>
      
      <button type="submit">Envoyer</button>
    </form>
  </section>

  <?php include 'Layout/footer.php'; ?>
  <script src="Content/js/annonce.js"></script>
</body>
</html>

  
