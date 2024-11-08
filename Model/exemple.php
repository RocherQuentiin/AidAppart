<?php
require_once 'CRUD.php';

// Création d'une instance de la classe Crud
$crud = new Crud();

// Exemple d'utilisation de la méthode selectAllFromTable
// Sélectionner toutes les entrées de la table 'Personne'
$table = $TABLES['PERSONNE']; // $TABLES est défini dans config.php
$resultats = $crud->selectAllFromTable($table);

// Afficher les résultats
echo "Liste des Personnes :<br>";
foreach ($resultats as $personne) {
    echo "ID: " . $personne['id'] . " - Nom: " . $personne['nom'] . " - Prénom: " . $personne['prénom'] . "- Email: " . $personne["email"] . "<br>";
}
echo "<br>";

// Exemple d'utilisation de la méthode supprimerById
// Supprimer l'personne avec l'ID 1
$idASupprimer = 2;
$crud->supprimerById($table, $idASupprimer);
echo "L'utilisateur avec l'ID $idASupprimer a été supprimé.";
$resultats = $crud->selectAllFromTable($table);

echo "<br>";
echo "<br>";
// Afficher les résultats
echo "Liste des Personnes :<br>";
foreach ($resultats as $personne) {
    echo "ID: " . $personne['id'] . " - Nom: " . $personne['nom'] . " - Prénom: " . $personne['prénom'] . "- Email: " . $personne["email"] . "<br>";
}
?>