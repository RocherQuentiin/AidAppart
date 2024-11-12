<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/stylesheet.css"/>
 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <!-- Logo de la navbar -->
    <a class="navbar-brand" href="#"><img class="" src="logo.png" /></a></a>

    <!-- Bouton de menu pour petits écrans -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu de la navbar -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Liens de navigation avec `space-between` -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Aides</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Locations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
      </ul>

      <!-- Bouton de connexion et icône de traduction alignés à droite -->
      <div class="d-flex align-items-center">
        <!-- Bouton de connexion -->
        <a href="#" class="btn me-3"><button>Mon compte</button></a>

         <!-- Icône de traduction -->
         <a href="#" class="">
            <img src="globe.png" alt="Traduire" title="Traduire" class="globe">
          </a>
      </div>
    </div>
  </div>
</nav>

</body>
</html>
