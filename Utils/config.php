<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'Aidappart');
define('DB_USER', 'default_user');
define('DB_PASS', 'AidappartNova');
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