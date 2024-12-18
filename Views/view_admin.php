<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/index.css">
    <link rel="stylesheet" href="Content/css/stylesheet.css">
    <link rel="stylesheet" href="Content/css/admin.css">
    <script src="Content/js/admin.js" defer></script>
    <title>Admin Page</title>
    
</head>
<body>
    <h1>Bienvenue, Administrateur</h1>
    <div class="navbar-menu" id="navbarMenu">        
        <ul class="navbar-links">
            <li><a href="?controller=admin&action=admin&page=Utilisateurs">Utilisateurs</a></li>
            <li><a href="?controller=admin&action=admin&page=Signalement">Signalement</a></li>
            <li><a href="?controller=admin&action=admin&page=Logement">Logement à confirmer</a></li>
        </ul>
    </div>
<?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'Utilisateurs':
                echo '<h2>Utilisateurs</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nom</th>';
                echo '<th>Prénom</th>';
                echo '<th>Email</th>';
                echo '<th>Role</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                foreach ($data['users'] as $user) {
                    echo "<tr>";
                    echo "<td>{$user['id']}</td>";
                    echo "<td>{$user['nom']}</td>";
                    echo "<td>{$user['prénom']}</td>";
                    echo "<td>{$user['email']}</td>";
                    echo "<td>" . implode(', ', $user['roles']) . "</td>";
                    echo "<td><button id='update_user'>Modifier</button><button>Supprimer</button></td>";
                    echo "</tr>";
                }
                echo '</table>';
                break;
            case 'Signalement':
                echo '<h2>Signalement</h2><p>Manage your Signalement here.</p>';
                break;
            case 'Logement':
                echo '<h2>Logement</h2><p>Adjust your Logement here.</p>';
                break;
            default:
                echo '<h2>Utilisateurs</h2><p>Welcome to the Utilisateurs.</p>';
                break;
        }
    } else {
        echo '<h2>Utilisateurs</h2><p>Welcome to the Utilisateurs.</p>';
    }?>
</body>
</html>