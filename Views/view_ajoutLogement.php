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

            <div class="part-haut">
                <div class="part-image">
                    <div class="left-column">
                        <div class="image-upload" onclick="document.getElementById('images').click();">
                            +
                            <input type="file" name="images[]" id="images" multiple accept="image/*" style="display:none;">
                        </div>
                        <div class="square"></div>
                        <div class="square"></div>
                    </div>
                    <div class="right-square"></div>
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

                    <div class="prix">
                        <label for="loyer">Loyer en €/mois :</label>
                        <input type="number" name="loyer" id="loyer" required>

                        <label for="charges">Charges en €/mois :</label>
                        <input type="number" name="charges" id="charges" required>
                    </div>
                    <div class="surface-pieces">
                        <label for="nb_pieces">Nombre de pièces :</label>
                        <input type="number" name="nb_pieces" id="nb_pieces" required>

                        <label for="surface">Surfaces en m² :</label>
                        <input type="number" name="surface" id="surface" required>
                    </div>
                    <div class="checkbox-group">
                        <div>
                            <label for="est_meuble">Meublé :</label>
                            <input type="checkbox" name="est_meuble" id="est_meuble">
                            <label for="a_WIFI">WiFi :</label>
                            <input type="checkbox" name="a_WIFI" id="a_WIFI">
                        </div>
                        <div>
                            <label for="est_accessible_PMR">Accessible PMR :</label>
                            <input type="checkbox" name="est_accessible_PMR" id="est_accessible_PMR">
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

            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="5" required></textarea>

            <button class="button" type="submit">Ajouter le logement</button>
        </form>
    </div>
<?php
require_once('Layout/footer.php');
?>
