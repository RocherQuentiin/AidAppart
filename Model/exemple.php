<?php
require_once 'Model.php';

// Création d'une instance de la classe Model
$model = new Model();

// Exemple d'utilisation de la méthode selectAllFromTable
// Sélectionner toutes les entrées de la table 'Personne'
$table = $TABLES['PERSONNE']; // $TABLES est défini dans config.php
$resultats = $model->selectAllFromTable($table);

// Afficher les résultats
echo "Liste des Personnes :<br>";
foreach ($resultats as $personne) {
    echo "ID: " . $personne['id'] . " - Nom: " . $personne['nom'] . " - Prénom: " . $personne['prénom'] . "- Email: " . $personne["email"] . "<br>";
}
echo "<br>";

// Exemple d'utilisation de la méthode supprimerById
// Supprimer l'personne avec l'ID 10
$idASupprimer = 10;
$model->supprimerById($table, $idASupprimer);
echo "L'utilisateur avec l'ID $idASupprimer a été supprimé.";
echo "<br>";
// Exemple d'utilisation de la méthode insertInTable
// Ajouter une nouvelle personne dans la table 'Personne'
$nom = "Doe";
$prenom = "John";
$email = "john.doe@emaple.com";
$actif = true;
$telephone = "1234568&a90";
$mdp = password_hash("password123", PASSWORD_BCRYPT);

$isInsert = $model->insererPersonne($nom, $prenom, $email, $actif, $telephone, $mdp);
if ($isInsert) {
    echo "L'utilisateur $prenom $nom a été ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur.";
}
echo "<br>";
echo "<br>";
// Afficher les résultats
$resultats = $model->selectAllFromTable($table);
echo "Liste des Personnes :<br>";
foreach ($resultats as $personne) {
    echo "ID: " . $personne['id'] . " - Nom: " . $personne['nom'] . " - Prénom: " . $personne['prénom'] . "- Email: " . $personne["email"] . "<br>";
}
?>