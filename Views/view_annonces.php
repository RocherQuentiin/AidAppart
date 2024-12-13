<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartment Listing</title>
  <link rel="stylesheet" href="Content/css/css_annonce.css">
</head>
<body>
  <?php include 'Layout/view_header.html'; ?>
  <!-- Main Container -->
  <div class="container-annonce">
    <!-- Image Gallery -->
    <div class="image-gallery">
      <img src="Content/Images/Annonce/room.jpg" alt="Room view">
      <img src="Content/Images/Annonce/pool.jpg" alt="Pool view">
      <img src="Content/Images/Annonce/lounge.jpg" alt="Lounge area">
      <img src="Content/Images/Annonce/rooftop.jpg" alt="Rooftop area">
      <button id="show-more" class="show-more">+ Show More</button>
    </div>

    <!-- Apartment Info Card -->
    <aside class="details">
      <h2>À partir de <strong>660€/mois</strong></h2>

      <p>Charges comprises</p>
      <p>Logements meublés de <strong>19m² à 19m²</strong></p>
      <p>Éligible aux aides (APL, ALS): <strong>Oui</strong></p>
      <p>Services inclus: <strong>Oui</strong></p>
      <p>Charges comprises</p>
      <p>Logements meublés de <strong>19m² à 19m²</strong></p>
      <p>Éligible aux aides (APL, ALS): <strong>Oui</strong></p>
      <p>Services inclus: <strong>Oui</strong></p>
      <button>Voir les chambres</button>
    </aside>
  </div>

  <aside class="details-info">
    <h2>À partir de <strong>660€/mois</strong></h2>

    <p>Charges comprises</p>
    <p>Logements meublés de <strong>19m² à 19m²</strong></p>
    <p>Éligible aux aides (APL, ALS): <strong>Oui</strong></p>
    <p>Services inclus: <strong>Oui</strong></p>
    <p>Charges comprises</p>
    <p>Logements meublés de <strong>19m² à 19m²</strong></p>
    <p>Éligible aux aides (APL, ALS): <strong>Oui</strong></p>
    <p>Services inclus: <strong>Oui</strong></p>
    <button>Voir les chambres</button>
  </aside>
</div>

  <!-- Additional Sections -->
  <section class="description">
    <h2>Description du logement</h2>
    <p>Pour vos études optez pour notre résidence.</p>
    <p>Séjourner chez Appart'City c'est retrouver le confort et le bien-être d'un chez-soi.</p>
    <p>Pour vos études optez pour notre résidence ***

      Séjourner chez Appart'City c'est retrouver le confort et le bien être d'un chez-soi, les services en plus !
      
      Appart'City vous propose
      des studios tout équipés : espace cuisine avec frigo, plaques, micro-onde, cafetière/bouilloire et lave-vaisselle, ;TV, wifi, bureau et salle-de-bain privative.
      
      
      
      Retrouvez également sur place des prestations hôtelières et services qui vous faciliteront la
      vie : petit-déjeuner, laverie, parking, piscine etc.
      
      De plus vous aurez a votre disposition une navette qui pourra vous emmenez a l'aéroport, dans le centre ville et ou le centre commercial sur demande.
      
      Attention ! Une taxe de séjour est appliquée pour chaque nuit passée dans la résidence !
    </p>
  </section>

  <section class="contact">
    <h2>Contactez le propriétaire</h2>
    <form>
      <label for="name">Nom:</label>
      <input type="text" id="name" placeholder="Votre nom" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" placeholder="Votre email" required>
      
      <label for="message">Message:</label>
      <textarea id="message" placeholder="Votre message au propriétaire" rows="5" required></textarea>
      
      <button type="submit">Envoyer</button>
    </form>
  </section>

  <!-- Map Section -->
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

  <!-- Additional Images -->
  <div id="carousel-container" class="carousel-container">
    <button class="carousel-arrow left" id="prev">&lt;</button>
    <div class="carousel-wrapper">
      <img src="images/kitchen.jpg" alt="Kitchen view">
      <img src="images/bathroom.jpg" alt="Bathroom view">
      <img src="images/balcony.jpg" alt="Balcony view">
      <img src="images/gym.jpg" alt="Gym view">
    </div>
    <button class="carousel-arrow right" id="next">&gt;</button>
    <button class="close-modal" id="close-modal">Close</button>
  </div>
  <?php include 'Layout/footer.html'; ?>
</body>
</html>

  
