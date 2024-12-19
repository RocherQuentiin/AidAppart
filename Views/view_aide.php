<?php
require_once('Layout/view_header.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AidAppart</title>
    <link href="Content/css/aide.css" rel="stylesheet">

</head>
<body class="aide">
    <main>
        <section class="eligibility">
            <h1>Je vérifie mes éligibilités aux aides</h1>
            <form id="eligibility-form">
                <!-- Groupe: Statut marital -->
                <div class="form-group">
                    <label>Statut marital</label>
                    <div class="options">
                        <button type="button">Célibataire</button>
                        <button type="button">Marié(e)</button>
                        <button type="button">Pacsé(e)</button>
                        <button type="button">En couple</button>
                        <button type="button">Parent isolé</button>
                    </div>
                </div>
    
                <!-- Groupe: Statut professionnel -->
                <div class="form-group">
                    <label>Statut professionnel</label>
                    <div class="options">
                        <button type="button">Étudiant à temps plein</button>
                        <button type="button">Alternant</button>
                        <button type="button">Étudiant salarié</button>
                        <button type="button">Demandeur d'emploi</button>
                        <button type="button">Sans emploi</button>
                    </div>
                </div>
    
                <!-- Groupe: Niveau d'études -->
                <div class="form-group">
                    <label>Niveau d'études</label>
                    <div class="options">
                        <button type="button">Bac</button>
                        <button type="button">Bac+2</button>
                        <button type="button">Bac+3</button>
                        <button type="button">Bac+4/5</button>
                        <button type="button">Doctorant(e)</button>
                    </div>
                </div>
    
                <!-- Groupe: Type de logement recherché -->
                <div class="form-group">
                    <label>Type de logement</label>
                    <div class="options">
                        <button type="button">Logement universitaire</button>
                        <button type="button">Appartement privé</button>
                        <button type="button">Colocation</button>
                        <button type="button">Résidence étudiante</button>
                        <button type="button">Chambre</button>
                    </div>
                </div>
    
                <!-- Groupe: Revenus ou bourse -->
                <div class="form-group">
                    <label>Revenus ou bourse</label>
                    <div class="options">
                        <button type="button">Boursier sur critères sociaux</button>
                    </div>
                </div>
    
                <!-- Bouton soumission -->
                <button type="submit" class="submit-btn" class="button">Lancer la recherche</button>
            </form>
        </section>
    </main>
    
    <script src="script.js"></script>

<?php
require_once('Layout/footer.html');
?>

