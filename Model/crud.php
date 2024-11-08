<?php
require_once 'config.php';

class Crud{
    protected $pdo;

    public function __construct() {
        /*
        * Connexion à la base de données avec les informations de connexion définies dans config.php
        */
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function selectAllFromTable($table) {
        /*
        * Sélectionner toutes les entrées de la table spécifiée
        * @param string $table - Nom de la table
        * @return array - Tableau contenant toutes les entrées de la table
        */
        $stmt = $this->pdo->query("SELECT * FROM " . $table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimerById($table, $id) {
        /*
        * Supprimer une entrée de la table spécifiée avec l'ID spécifié
        * @param string $table - Nom de la table
        * @param int $id - ID de l'entrée à supprimer
        */
        try{
            $sql = "DELETE FROM $table WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}


?>