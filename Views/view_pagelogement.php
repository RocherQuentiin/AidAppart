<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Content/css/pagelogement.css">
    <link rel="stylesheet" href="Content/css/index.css">
    <title>Liste des Logements</title>
</head>
<body>
    <div class="search-selection">
        <h1>Rechercher un Logement</h1>
        <div class="search-bar">
            <input type="text" placeholder="Type de logement">
            <input type="text" placeholder="Surface">
            <input type="text" placeholder="Loyer max">
            <button>Rechercher</button>
        </div>
    </div>
    <div class="filters">
        <h2>Filtres</h2>
        <ul>
            <li><input type="checkbox"> Meublé</li>
            <li><input type="checkbox"> WiFi</li>
            <li><input type="checkbox"> Accessible PMR</li>
            <li><input type="checkbox"> Parking</li>
        </ul>
    </div>
    <h1>Liste des Logements</h1>
    <div class="listings">
    <?php foreach ($logements as $logement): ?>
        <div class="listing">
            <h2>Logement ID: <?php echo $logement['id']; ?></h2>
            <p>Type: <?php echo $logement['type']; ?></p>
            <p>Surface: <?php echo $logement['surface']; ?> m²</p>
            <p>Propriétaire ID: <?php echo $logement['proprietaire']; ?></p>
            <p>Loyer: <?php echo $logement['loyer']; ?> €</p>
            <p>Charges: <?php echo $logement['charges']; ?> €</p>
            <p>Date de création: <?php echo $logement['creer_a']; ?></p>
            <p>Adresse ID: <?php echo $logement['adresse']; ?></p>
            <p>Meublé: <?php echo $logement['est_meuble'] ? 'Oui' : 'Non'; ?></p>
            <p>WiFi: <?php echo $logement['a_WIFI'] ? 'Oui' : 'Non'; ?></p>
            <p>Accessible PMR: <?php echo $logement['est_accessible_PMR'] ? 'Oui' : 'Non'; ?></p>
            <p>Nombre de pièces: <?php echo $logement['nb_pieces']; ?></p>
            <p>Parking: <?php echo $logement['a_parking'] ? 'Oui' : 'Non'; ?></p>
            <p>Description: <?php echo $logement['description']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
    </div>
</body>
</html>