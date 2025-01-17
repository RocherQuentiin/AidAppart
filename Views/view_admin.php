<?php
require_once('Layout/view_header.php');?>
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
            <li><a href="?controller=admin&action=admin&page=AllLogement">Tous les logements</a></li>
            <li><a href="?controller=admin&action=admin&page=Logement">Logement à confirmer</a></li>
        </ul>
    </div>
<?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'Utilisateurs':
                echo '<h2>Utilisateurs</h2>';
                echo '<form id="form-assign-role" action="?controller=admin&action=search_user" method="POST">';
                echo '<lable for="select-user">Rechercher un utilisateur</lable>';
                echo '<input id="select-user" type="text"></input>';
                echo '<button type="submit">Rechercher</button>';
                echo '</form>';
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
                    echo "<td>
                            <button id='update_user' class='button'>Modifier</button>
                            <button class='delete button' id='delete_user' onclick='deleteUser({$user['id']}, \"{$user['nom']}\", \"{$user['prénom']}\")'>
                                <img src='Content/Images/Poubelle.png' alt='Supprimer'>
                            </button>
                        </td>";
                    echo "</tr>";
                }
                echo '</table>';
                break;
            case 'Signalement':
                echo '<h2>Logement signalé</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>ID Logement</th>';
                echo '<th>Personne</th>';
                echo '<th>Commentaire</th>';
                echo '<th>Date</th>';
                echo '</tr>';
                foreach ($data['reportedLogements'] as $logement) {
                    echo "<tr onclick=\"window.location.href='?controller=annonces&action=annonces&id={$logement['id_logement']}'\" style='cursor:pointer;'>";
                    echo "<td>{$logement['id_logement']}</td>";
                    echo "<td>{$logement['reporter_name']}</td>";
                    echo "<td>{$logement['commentaire']}</td>";
                    echo "<td>{$logement['creer_a']}</td>";
                    echo "</tr>";
                }
                echo '</table>';
                break;
            case 'AllLogement':
                echo '<h2>Tous les logements</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>ID Logement</th>';
                echo '<th>Commentaire</th>';
                echo '<th>Date</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                foreach ($data['allLogements'] as $logement) {
                    echo "<tr>";
                    echo "<div onclick=\"window.location.href='?controller=annonces&action=annonces&id={$logement['id']}'\" style='cursor:pointer;'>";
                    echo "<td>{$logement['id']}</td>";
                    echo "<td>{$logement['description']}</td>";
                    echo "<td>{$logement['creer_a']}</td>";
                    echo "</div>";
                    echo "<td>
                            <button class='delete button' id='delete_user' onclick='deleteLogement({$logement['id']})'>
                                <img src='Content/Images/Poubelle.png' alt='Supprimer'>
                            </button>
                        </td>";
                    echo "</tr>";
                }
                echo '</table>';
                break;
            case 'Logement':
                echo '<h2>Logement</h2><p>Adjust your Logement here.</p>';
                break;
            default:
                header('Location: ?controller=admin&action=admin&page=Utilisateurs');
                break;
        }
    } else {
        header('Location: ?controller=admin&action=admin&page=Utilisateurs');
    }
    require 'Layout/footer.php';
    ?>
</body>
</html>
<?php
require_once('Layout/footer.php');
?>