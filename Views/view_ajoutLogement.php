<?php
require_once('Layout/view_header.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/ajoutLogement.css">

    <title>Ajouter un Logement</title>
</head>
 <div class="container">
        <h1>Ajouter un Logement</h1>
        <form method="POST" action="?controller=ajoutLogement&action=addLogement" enctype="multipart/form-data">

            <div class="flex">
                <div class="image-upload" onclick="document.getElementById('images').click();">
                    +
                    <input type="file" name="images[]" id="images" multiple accept="image/*">
                </div>

                <div class="form-section">
                    <label for="type">Type :</label>
                    <select name="type" id="type" required>
                        <option value="Appartement">Appartement</option>
                        <option value="Chambre">Chambre</option>
                        <option value="Studio">Studio</option>
                        <option value="Colocation">Colocation</option>
                        <option value="Résidence">Résidence</option>
                    </select>


                    <label for="nb_pieces">Nombre de pièces :</label>
                    <input type="number" name="nb_pieces" id="nb_pieces" required>

                    <div class="checkbox-group">
                        <div>
                            <label for="est_meuble">Meublé :</label>
                            <input type="checkbox" name="est_meuble" id="est_meuble">
                        </div>
                        <div>
                            <label for="a_WIFI">WiFi :</label>
                            <input type="checkbox" name="a_WIFI" id="a_WIFI">
                        </div>
                        <div>
                            <label for="est_accessible_PMR">Accessible PMR :</label>
                            <input type="checkbox" name="est_accessible_PMR" id="est_accessible_PMR">
                        </div>
                        <div>
                            <label for="a_parking">Parking :</label>
                            <input type="checkbox" name="a_parking" id="a_parking">
                        </div>
                    </div>
                </div>
            </div>

            <label for="numero">Numéro :</label>
            <input type="number" name="numero" id="numero" required>

            <label for="rue">Rue :</label>
            <input type="text" name="rue" id="rue" required>

            <label for="code_postal">Code Postal :</label>
            <input type="number" name="code_postal" id="code_postal" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="5" required></textarea>

            <button type="submit">Ajouter le logement</button>
        </form>
    </div>
<?php
require_once('Layout/footer.php');
?>
