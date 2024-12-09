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
    <div class="row">
    <div class="filters">
    <h2>Filtres</h2>
    <h3>Nombre de pièces</h3>
    <select>
        <option value="">Tous</option>
        <?php foreach ($nbPieces as $piece): ?>
            <option value="<?php echo $piece['nb_pieces']; ?>"><?php echo $piece['nb_pieces']; ?></option>
        <?php endforeach; ?>
    </select>
    <h3>Type de logement</h3>
    <select>
        <option value="">Tous</option>
        <?php foreach ($types as $type): ?>
            <option value="<?php echo $type; ?>"><?php echo $type["type"]; ?></option>
        <?php endforeach; ?>
    </select>
    <h3>Surface</h3>
    <input type="number" placeholder="<?php echo $minMaxSurface['min'] . ' ( m²)'; ?> " min="<?php echo $minMaxSurface['min']; ?>">
    <input type="number" placeholder="<?php echo $minMaxSurface['max'] . ' ( m²)'; ?> " max="<?php echo $minMaxSurface['max']; ?>">
    <h3>Loyer</h3>
    <input type="number" placeholder="<?php echo $minMaxLoyer['min'] . ' (€)'; ?>" max="<?php echo $minMaxLoyer['max']; ?>">
    <input type="number" placeholder="<?php echo $minMaxLoyer['max'] . ' (€)'; ?>" min="<?php echo $minMaxLoyer['max']; ?>" >
    <h3>Charges</h3>
    <input type="number" placeholder="<?php echo $minMaxCharges['min'] . ' (€)'; ?>" max="<?php echo $minMaxCharges['max']; ?>">
    <input type="number" placeholder="<?php echo $minMaxCharges['max'] . ' (€)'; ?>" min="<?php echo $minMaxCharges['max']; ?>" >
    <ul>
        <li><input type="checkbox"> Meublé</li>
        <li><input type="checkbox"> WiFi</li>
        <li><input type="checkbox"> Accessible PMR</li>
        <li><input type="checkbox"> Parking</li>
    </ul>
    </div>
    <div class="listings">
    <?php foreach ($logements as $logement): ?>
        <div class="listing">
            <img src="/AidAppart/Content/Images/logement.png" alt="Image du logement">
            <p>Type: <?php echo $logement['type']; ?></p>
            <!-- <p>Propriétaire ID: <?php echo $logement['proprietaire']; ?></p> -->
            <p>Loyer: <?php echo $logement['loyer']; ?> €</p>
            <p>Charges: <?php echo $logement['charges']; ?> €</p>
            <!-- <p>Date de création: <?php echo $logement['creer_a']; ?></p> -->
            <p>Adresse ID: <?php echo $logement['adresse']; ?></p>
            <p>Meublé: <input type="checkbox" disabled <?php echo $logement['est_meuble'] ? 'checked' : ''; ?>></p>
            <p>WiFi: <input type="checkbox" disabled <?php echo $logement['a_WIFI'] ? 'checked' : ''; ?>></p>
            <p>Accessible PMR: <input type="checkbox" disabled <?php echo $logement['est_accessible_PMR'] ? 'checked' : ''; ?>></p>
            <p>Nombre de pièces: <?php echo $logement['nb_pieces']; ?></p>
            <p>Parking: <input type="checkbox" disabled <?php echo $logement['a_parking'] ? 'checked' : ''; ?>></p>
            <p>Description: <?php echo $logement['description']; ?></p>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
</body>
</html>