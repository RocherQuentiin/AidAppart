<?php
// Configuration de la base de données



$servername = 'localhost:3306';
$username = 'default_user';
$password = 'AidappartNova';
$dbname = 'Aidappart';


global $TABLES;
$TABLES = [
    'PERSONNE' => 'Personne',
    'MESSAGERIE' => 'Messagerie',
    'LOGEMENT' => 'Logement',
    'ADRESSE' => 'Adresse',
    'MAISON' => 'Maison',
    'APPARTEMENT' => 'Appartement',
    'AVIS' => 'Avis',
    'ANNONCE' => 'Annonce',
    'FAVORIS_SIGNALEMENT' => 'Favoris_Signalement',
    'CANDIDATURE' => 'Candidature',
    'GARENT' => 'Garent'
];
?>