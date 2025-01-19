<?php
require_once('Layout/view_header.php');
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AidAppart - Résultats de recherche</title>
    <link href="Content/css/recherche.css" rel="stylesheet">
</head>
<body>
    <main>
        <section class="eligibility">
            <h1>Les aides disponibles en fonction de vos critères</h1>

            <?php
            // Mappage des options à des noms lisibles
            $labels = [
                'R1' => [
                    'option1' => 'Célibataire',
                    'option2' => 'Marié(e)',
                    'option3' => 'Pacsé(e)',
                    'option4' => 'En couple',
                    'option5' => 'Parent isolé'
                ],
                'R2' => [
                    'option1' => 'Étudiant à temps plein',
                    'option2' => 'Alternant(e)',
                    'option3' => 'Étudiant(e) salarié(e)',
                    'option4' => 'Demandeur d\'emploi',
                    'option5' => 'Sans emploi'
                ],
                'R3' => [
                    'option1' => 'Bac',
                    'option2' => 'Bac +2',
                    'option3' => 'Bac +3',
                    'option4' => 'Bac +4/5',
                    'option5' => 'Doctorant(e)'
                ],
                'R4' => [
                    'option1' => 'Logement universitaire',
                    'option2' => 'Appartement privé',
                    'option3' => 'Colocation',
                    'option4' => 'Résidence étudiante',
                    'option5' => 'Chambre'
                ],
                'R5' => [
                    'option1' => 'Boursier sur critères sociaux',
                    'option2' => 'Aide au logement',
                    'option3' => 'Aucune aide'
                ]
            ];

            // Récupérer les critères envoyés par le formulaire (POST)
            $statutMarital = isset($_POST['R1']) ? $_POST['R1'] : null;
            $statutPro = isset($_POST['R2']) ? $_POST['R2'] : null;
            $niveauEtudes = isset($_POST['R3']) ? $_POST['R3'] : null;
            $typeLogement = isset($_POST['R4']) ? $_POST['R4'] : null;
            $revenusOuBourse = isset($_POST['R5']) ? $_POST['R5'] : null;

            // Afficher les critères choisis
            echo "<div class='criteria'>";
            echo "<h2>Vos critères sélectionnés :</h2>";
            echo "<ul>";
            if ($statutMarital) echo "<li><strong>Statut marital :</strong> " . $labels['R1'][$statutMarital] . "</li>";
            if ($statutPro) echo "<li><strong>Statut professionnel :</strong> " . $labels['R2'][$statutPro] . "</li>";
            if ($niveauEtudes) echo "<li><strong>Niveau d'études :</strong> " . $labels['R3'][$niveauEtudes] . "</li>";
            if ($typeLogement) echo "<li><strong>Type de logement :</strong> " . $labels['R4'][$typeLogement] . "</li>";
            if ($revenusOuBourse) echo "<li><strong>Revenus ou bourse :</strong> " . $labels['R5'][$revenusOuBourse] . "</li>";
            echo "</ul>";
            echo "</div>";

            // Liste complète des aides disponibles
            $aides = [
                // Aides par statut marital
                ['nom' => 'APL (Aide personnalisée au logement)', 'statutMarital' => 'option1', 'statutPro' => null, 'niveauEtudes' => null, 'typeLogement' => null, 'revenusOuBourse' => null],
                ['nom' => 'Allocation de soutien familial (ASF)', 'statutMarital' => 'option5', 'statutPro' => null, 'niveauEtudes' => null, 'typeLogement' => null, 'revenusOuBourse' => null],
                
                // Aides par statut professionnel
                ['nom' => 'Bourse sur critères sociaux (CROUS)', 'statutMarital' => null, 'statutPro' => 'option1', 'niveauEtudes' => null, 'typeLogement' => null, 'revenusOuBourse' => 'option1'],
                ['nom' => 'Aide Mobili-Jeune', 'statutMarital' => null, 'statutPro' => 'option2', 'niveauEtudes' => null, 'typeLogement' => null, 'revenusOuBourse' => null],

                // Aides par niveau d’études
                ['nom' => 'Bourse Erasmus+', 'statutMarital' => null, 'statutPro' => null, 'niveauEtudes' => 'option3', 'typeLogement' => null, 'revenusOuBourse' => null],
                ['nom' => 'Contrats CIFRE', 'statutMarital' => null, 'statutPro' => null, 'niveauEtudes' => 'option5', 'typeLogement' => null, 'revenusOuBourse' => null],

                // Aides par type de logement
                ['nom' => 'Garantie Visale', 'statutMarital' => null, 'statutPro' => null, 'niveauEtudes' => null, 'typeLogement' => 'option2', 'revenusOuBourse' => null],

                // Aides par revenus ou bourse
                ['nom' => 'Fonds d’urgence des associations étudiantes', 'statutMarital' => null, 'statutPro' => null, 'niveauEtudes' => null, 'typeLogement' => null, 'revenusOuBourse' => 'option3'],
            ];

            // Filtrer les aides en fonction des critères sélectionnés
            $aidesDisponibles = [];
            foreach ($aides as $aide) {
                if (
                    ($statutMarital == $aide['statutMarital'] || $statutMarital === null) &&
                    ($statutPro == $aide['statutPro'] || $statutPro === null) &&
                    ($niveauEtudes == $aide['niveauEtudes'] || $niveauEtudes === null) &&
                    ($typeLogement == $aide['typeLogement'] || $typeLogement === null) &&
                    ($revenusOuBourse == $aide['revenusOuBourse'] || $revenusOuBourse === null)
                ) {
                    $aidesDisponibles[] = $aide['nom'];
                }
            }

            // Affichage des aides disponibles
            echo "<div class='aides-disponibles'>";
            if (count($aidesDisponibles) > 0) {
                echo "<h2>Aides disponibles :</h2>";
                echo '<ul>';
                foreach ($aidesDisponibles as $aide) {
                    echo '<li class="aide">' . $aide . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucune aide trouvée pour les critères sélectionnés.</p>';
            }
            echo "</div>";
            ?>
        </section>
    </main>

    <?php
    require_once('Layout/footer.php');
    ?>
</body>
</html>
