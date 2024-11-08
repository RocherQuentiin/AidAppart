<?php
// Inclure le fichier de connexion à la base de données
require_once 'connexionBD.php';

// Créer une nouvelle instance de la connexion à la base de données
$conn = new ConnexionBD();

// Se connecter à la base de données
$db = $conn->connect();

if ($db) {
    echo "Connexion à la base de données réussie !";
} else {
    echo "Échec de la connexion à la base de données.";
}

// Exemple d'opérations CRUD (Create, Read, Update, Delete) sur la base de données
// Insérer une nouvelle personne dans la table personne
$sql = "INSERT INTO personne (nom, prénom, email, actif, telephone, mdp) VALUES ('Doe', 'John', 'john.doe@example.com', 0, '0606060606', '123456')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// -----------------------------------------------------------------------------------------

// Affiche toutes les lignes dans la table personne
$sql = "SELECT * FROM personne";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Nom: " . $row["nom"] . " - Prénom: " . $row["prénom"] . " - Email: " . $row["email"] . " - Actif: " . $row["actif"] . " - Téléphone: " . $row["telephone"] . "<br>";
    }
} else {
    echo "0 results";
}

// -----------------------------------------------------------------------------------------

// Supprimer une personne de la table personne avec l'id spécifié
$id = 1; // Remplacez cette valeur par l'ID de la personne que vous souhaitez supprimer

$sql = "DELETE FROM personne WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// -----------------------------------------------------------------------------------------

// Mettre à jour une personne dans la table personne avec l'id spécifié
$id = 1; // Remplacez cette valeur par l'ID de la personne que vous souhaitez mettre à jour
$nom = 'Smith';
$prénom = 'Jane';
$email = 'jane.smith@example.com';
$actif = 1;
$telephone = '0707070707';
$mdp = 'abcdef';

$sql = "UPDATE personne SET nom='$nom', prénom='$prénom', email='$email', actif=$actif, telephone='$telephone', mdp='$mdp' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>