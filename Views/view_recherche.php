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
            // Récupérer les critères envoyés par le formulaire
            $statutMarital = isset($_GET['R1']) ? $_GET['R1'] : null;
            $statutPro = isset($_GET['R2']) ? $_GET['R2'] : null;
            // Récupérer d'autres critères selon ce que tu veux utiliser...

            // Simuler des aides en fonction des critères
            // Dans un cas réel, tu récupérerais ces informations d'une base de données
            $aides = [
                ['nom' => 'Aide au logement étudiant', 'critere' => 'option1', 'statutPro' => 'option1'],
                ['nom' => 'Bourse sur critères sociaux', 'critere' => 'option3', 'statutPro' => 'option1'],
                ['nom' => 'Aide à la mobilité', 'critere' => 'option5', 'statutPro' => 'option2'],
                // Plus d'aides ici...
            ];

            // Filtrer les aides en fonction des critères sélectionnés
            $aidesDisponibles = [];
            foreach ($aides as $aide) {
                if (($statutMarital == $aide['critere'] || $statutMarital === null) &&
                    ($statutPro == $aide['statutPro'] || $statutPro === null)) {
                    $aidesDisponibles[] = $aide['nom'];
                }
            }

            // Affichage des aides disponibles
            if (count($aidesDisponibles) > 0) {
                echo '<ul>';
                foreach ($aidesDisponibles as $aide) {
                    echo '<li class="aide">' . $aide . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucune aide trouvée pour les critères sélectionnés.</p>';
            }
            ?>

        </section>
    </main>

    <?php
require_once('Layout/footer.php');
?>

</body>
</html>
