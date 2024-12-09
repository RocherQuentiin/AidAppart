<?php
// Configuration de la base de données
$environment = (getenv('SERVER_NAME') == 'localhost') ? 'local' : 'production';
var_dump($environment);
if ( $environment == "local") {
    $servername = 'localhost';
    $username = 'default_user';
    $password = 'AidappartNova';
    $dbname = 'aidappart';
} else {
    $servername = getenv("MYSQL_HOST");
    $username = getenv("MYSQL_USER");
    $password = getenv("MYSQL_PASSWORD");
    $dbname = getenv("MYSQL_DATABASE");
}

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