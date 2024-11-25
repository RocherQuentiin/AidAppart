<?php
require_once '../../Model/Model.php';

$model = new Model();
$logements = $model->selectAllFromTable('Logement');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagelogement.css"/>

    <title>Liste des Logements</title>
</head>
<body>
    <h1>Liste des Logements</h1>
    <?php foreach ($logements as $logement): ?>
        <div>
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
</body>
</html>