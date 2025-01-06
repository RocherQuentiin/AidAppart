<?php
require_once('Layout/view_header.php');?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AidAppart</title>
    <link href="Content/css/aide.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <main>
        <section class="eligibility">
            <h1>Je vérifie mes éligibilités aux aides</h1>
            <form id="eligibility-form">
                <!-- Groupe: Statut marital -->
                <div class="form-group">
                    <label for="R1">Statut marital</label>
                    <select id="R1">
                        <option value="" disabled selected>Choisir...</option>
                        <option value="option1">Célibataire</option>
                        <option value="option2">Marié(e)</option>
                        <option value="option3">Pacsé(e)</option>
                        <option value="option4">En couple</option>
                        <option value="option5">Parent isolé</option>
                    </select>
                </div>

                <!-- Groupe: Statut professionnel -->
                <div class="form-group hidden">
                    <label for="R2">Statut professionnel</label>
                    <select id="R2">
                        <option value="" disabled selected>Choisir...</option>
                        <option value="option1">Etudiant à temps plein</option>
                        <option value="option2">Alternant(e)</option>
                        <option value="option3">Etudiant(e) salarié(e)</option>
                        <option value="option4">Demandeur d'emploi</option>
                        <option value="option5">Sans emploi</option>
                    </select>
                </div>

                <!-- Groupe: Niveau d'études -->
                <div class="form-group hidden">
                    <label for="R3">Niveau d'études</label>
                    <select id="R3">
                        <option value="" disabled selected>Choisir...</option>
                        <option value="option1">Bac</option>
                        <option value="option2">Bac +2</option>
                        <option value="option3">Bac +3</option>
                        <option value="option4">Bac +4/5</option>
                        <option value="option5">Doctorant(e)</option>
                    </select>
                </div>

                <!-- Groupe: Type de logement recherché -->
                <div class="form-group hidden">
                    <label for="R4">Type de logement</label>
                    <select id="R4">
                        <option value="" disabled selected>Choisir...</option>
                        <option value="option1">Logement universitaire</option>
                        <option value="option2">Appartement privé</option>
                        <option value="option3">Colocation</option>
                        <option value="option4">Résidence étudiante</option>
                        <option value="option5">Chambre</option>
                    </select>
                </div>

                <!-- Groupe: Revenus ou bourse -->
                <div class="form-group hidden">
                    <label for="R5">Revenus ou bourse</label>
                    <select id="R5">
                        <option value="" disabled selected>Choisir...</option>
                        <option value="option1">Boursier sur critères sociaux</option>
                        <option value="option2">Aide au logement</option>
                        <option value="option3">Aucune aide</option>
                    </select>
                </div>

                <!-- Bouton soumission -->
                <button type="submit" class="submit-btn hidden">Lancer la recherche</button>
            </form>
        </section>
    </main>
    
    <script src="script.js"></script>
<?php

require_once('Layout/footer.php');
?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formGroups = document.querySelectorAll(".form-group");
        formGroups.forEach((group, index) => {
            const select = group.querySelector("select");

            // Quand l'utilisateur change un select, on affiche le suivant
            select.addEventListener("change", () => {
                if (index + 1 < formGroups.length) {
                    const nextGroup = formGroups[index + 1];
                    nextGroup.classList.remove("hidden");
                } else {
                    // Si on est à la fin, afficher le bouton
                    const submitBtn = document.querySelector(".submit-btn");
                    submitBtn.classList.remove("hidden");
                }
            });
        });
    });
</script>
