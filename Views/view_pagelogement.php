<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Content/css/pagelogement.css">
    <link rel="stylesheet" href="Content/css/index.css">
    <script src="Content/js/pagelogement.js" defer></script>
    <title>Liste des Logements</title>
</head>
<body>
    <?php include 'Layout/view_header.html'; ?>
    <div class="search-selection">
        <h1>Trouver un logement étudiant à $Ville </h1>
        <div class="search-bar">
            <input type="text" placeholder="Type de logement">
            <input type="text" placeholder="Surface">
            <input type="text" placeholder="Loyer max">
            <button>Rechercher</button>
        </div>
    </div>
    <div class="row">
        <div class="filters">
            <h2>Tous les filtres</h2>
            <h3>Nombre de pièces</i></h3>
            <select id="nb-pieces">
                <option value="">Tous</option>
                <?php foreach ($nbPieces as $piece): ?>
                    <option value="<?php echo $piece['nb_pieces']; ?>"><?php echo $piece['nb_pieces']; ?></option>
                <?php endforeach; ?>
            </select>
            <h3>Type de logement</h3>
            <select id="type-logement" >
                <option value="">Tous</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?php echo $type["type"]; ?>"><?php echo $type["type"]; ?></option>
                <?php endforeach; ?>
            </select>
            <h3>Surface</i> </h3>
            <input type="number" id="surface-min" placeholder="<?php echo $minMaxSurface['min'] . ' ( m²)'; ?>" min="<?php echo $minMaxSurface['min']; ?>">
            <input type="number" id="surface-max" placeholder="<?php echo $minMaxSurface['max'] . ' ( m²)'; ?>" max="<?php echo $minMaxSurface['max']; ?>">
            <h3>Loyer</h3>
            <input type="number" id="loyer-min" placeholder="<?php echo $minMaxLoyer['min'] . ' (€)'; ?>" max="<?php echo $minMaxLoyer['max']; ?>">
            <input type="number" id="loyer-max" placeholder="<?php echo $minMaxLoyer['max'] . ' (€)'; ?>" min="<?php echo $minMaxLoyer['max']; ?>">
            <h3>Charges</h3>
            <input type="number" id="charges-min" placeholder="<?php echo $minMaxCharges['min'] . ' (€)'; ?>" max="<?php echo $minMaxCharges['max']; ?>">
            <input type="number" id="charges-max" placeholder="<?php echo $minMaxCharges['max'] . ' (€)'; ?>" min="<?php echo $minMaxCharges['max']; ?>">
            <ul>
                <li><input type="checkbox" id="meuble"> Meublé</li>
                <li><input type="checkbox" id="wifi"> WiFi</li>
                <li><input type="checkbox" id="accessible-pmr"> Accessible PMR</li>
                <li><input type="checkbox" id="parking"> Parking</li>
            </ul>
        </div>
        <div class="listings">
        </div>
    </div>

    <?php include 'Layout/footer.html'; ?>
</body>
</html>