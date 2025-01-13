<?php
require_once('Layout/view_header.php');
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AidAppart</title>
    <link href="Content/css/aide.css" rel="stylesheet">
    <script src="Content/js/aide.js"></script>


</head>
<body>
    <!-- Contenu principal -->
    <main>
        <section class="eligibility">
            <h1>Je vérifie mes éligibilités aux aides</h1>
            <form id="eligibility-form" action="?controller=recherche" method="POST">
                <!-- Groupe: Statut marital -->
                <div class="form-group" id="group-1">
                    <label for="R1">Statut marital</label>
                    <select id="R1" name="R1" onchange="showNextGroup(2)">
                        <option value="option1">Célibataire</option>
                        <option value="option2">Marié(e)</option>
                        <option value="option3">Pacsé(e)</option>
                        <option value="option4">En couple</option>
                        <option value="option5">Parent isolé</option>
                    </select>
                </div>

                <!-- Groupe: Statut professionnel (initialement caché) -->
                <div class="form-group" id="group-2" style="display:none;">
                    <label for="R2">Statut professionnel</label>
                    <select id="R2" name="R2" onchange="showNextGroup(3)">
                        <option value="option1">Étudiant à temps plein</option>
                        <option value="option2">Alternant(e)</option>
                        <option value="option3">Étudiant(e) salarié(e)</option>
                        <option value="option4">Demandeur d'emploi</option>
                        <option value="option5">Sans emploi</option>
                    </select>
                </div>

                <!-- Groupe: Niveau d'études (initialement caché) -->
                <div class="form-group" id="group-3" style="display:none;">
                    <label for="R3">Niveau d'études</label>
                    <select id="R3" name="R3" onchange="showNextGroup(4)">
                        <option value="option1">Bac</option>
                        <option value="option2">Bac +2</option>
                        <option value="option3">Bac +3</option>
                        <option value="option4">Bac +4/5</option>
                        <option value="option5">Doctorant(e)</option>
                    </select>
                </div>

                <!-- Groupe: Type de logement (initialement caché) -->
                <div class="form-group" id="group-4" style="display:none;">
                    <label for="R4">Type de logement</label>
                    <select id="R4" name="R4" onchange="showNextGroup(5)">
                        <option value="option1">Logement universitaire</option>
                        <option value="option2">Appartement privé</option>
                        <option value="option3">Colocation</option>
                        <option value="option4">Résidence étudiante</option>
                        <option value="option5">Chambre</option>
                    </select>
                </div>

                <!-- Groupe: Revenus ou bourse (initialement caché) -->
                <div class="form-group" id="group-5" style="display:none;">
                    <label for="R5">Revenus ou bourse</label>
                    <select id="R5" name="R5">
                        <option value="option1">Boursier sur critères sociaux</option>
                        <option value="option2">Aide au logement</option>
                        <option value="option3">Aucune aide</option>
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="submit-btn">Lancer la recherche</button>
              
            </form>
        </section>
    </main>

    <!-- Footer -->


<?php
require_once('Layout/footer.php');
?>
</body>
</html>

