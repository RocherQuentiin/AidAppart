<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Logement</title>
</head>
<body>
    <h1>Ajouter un Logement</h1>
    <form method="POST" action="?controller=ajoutLogement&action=addLogement" enctype="multipart/form-data">

        <label for="type">Type :</label>
        <select name="type" id="type" required>
            <option value="Appartement">Appartement</option>
            <option value="Chambre">Chambre</option>
            <option value="Studio">Studio</option>
            <option value="Colocation">Colocation</option>
            <option value="Résidence">Résidence</option>
        </select><br>

        <label for="surface">Surface (en m²) :</label>
        <input type="number" name="surface" id="surface" required><br>

        <label for="proprietaire">ID Propriétaire :</label>
        <input type="number" name="proprietaire" id="proprietaire" required><br>

        <label for="loyer">Loyer :</label>
        <input type="number" name="loyer" id="loyer" required><br>

        <label for="charges">Charges :</label>
        <input type="number" name="charges" id="charges" required><br>

        <label for="adresse">Adresse (ID) :</label>
        <input type="number" name="adresse" id="adresse" required><br>

        <label for="est_meuble">Meublé :</label>
        <input type="checkbox" name="est_meuble" id="est_meuble"><br>

        <label for="a_WIFI">WiFi :</label>
        <input type="checkbox" name="a_WIFI" id="a_WIFI"><br>

        <label for="est_accessible_PMR">Accessible PMR :</label>
        <input type="checkbox" name="est_accessible_PMR" id="est_accessible_PMR"><br>

        <label for="nb_pieces">Nombre de pièces :</label>
        <input type="number" name="nb_pieces" id="nb_pieces" required><br>

        <label for="a_parking">Parking :</label>
        <input type="checkbox" name="a_parking" id="a_parking"><br>

        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows="5" required></textarea><br>

        <label for="images">Images :</label>
        <input type="file" name="images[]" id="images" multiple accept="image/*"><br><br>

        <button type="submit">Ajouter le logement</button>
    </form>
</body>
</html>
