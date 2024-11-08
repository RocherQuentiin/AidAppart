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

    public function deleteById($table, $id) {
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
            echo "Erreur PDO : " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

        public function insertPersonne($nom, $prenom, $email, $actif, $telephone, $mdp) {
            /*
            * Insérer une nouvelle personne dans la table Personne
            * @param string $nom - Nom de la personne
            * @param string $prenom - Prénom de la personne
            * @param string $email - Email de la personne
            * @param bool $actif - Statut actif de la personne
            * @param string $telephone - Téléphone de la personne
            * @param string $mdp - Mot de passe de la personne
            * @return bool - Retourne true en cas de succès, false en cas d'échec
            */
            try {
                $sql = "INSERT INTO Personne (nom, prénom, email, actif, telephone, mdp) VALUES (:nom, :prenom, :email, :actif, :telephone, :mdp)";
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'actif' => $actif,
                    'telephone' => $telephone,
                    'mdp' => $mdp
                ]);
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            } 
                
        }

        public function insertLogement($type, $surface, $proprietaire, $loyer, $charges, $creer_a, $adresse, $est_meuble, $a_WIFI, $est_accessible_PMR, $nb_pieces, $a_parking, $description) {
            /*
            * Insérer un nouveau logement dans la table Logement
            * @param string $type - Type de logement
            * @param int $surface - Surface du logement
            * @param int $proprietaire - ID du propriétaire
            * @param int $loyer - Loyer du logement
            * @param int $charges - Charges du logement
            * @param string $creer_a - Date de création
            * @param int $adresse - ID de l'adresse
            * @param bool $est_meuble - Statut meublé du logement
            * @param bool $a_WIFI - Statut WiFi du logement
            * @param bool $est_accessible_PMR - Accessibilité PMR du logement
            * @param int $nb_pieces - Nombre de pièces du logement
            * @param bool $a_parking - Statut parking du logement
            * @param string $description - Description du logement
            * @return bool - Retourne true en cas de succès, false en cas d'échec
            */
            try {
            $sql = "INSERT INTO Logement (type, surface, proprietaire, loyer, charges, creer_a, adresse, est_meuble, a_WIFI, est_accessible_PMR, nb_pieces, a_parking, description) VALUES (:type, :surface, :proprietaire, :loyer, :charges, :creer_a, :adresse, :est_meuble, :a_WIFI, :est_accessible_PMR, :nb_pieces, :a_parking, :description)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'type' => $type,
                'surface' => $surface,
                'proprietaire' => $proprietaire,
                'loyer' => $loyer,
                'charges' => $charges,
                'creer_a' => $creer_a,
                'adresse' => $adresse,
                'est_meuble' => $est_meuble,
                'a_WIFI' => $a_WIFI,
                'est_accessible_PMR' => $est_accessible_PMR,
                'nb_pieces' => $nb_pieces,
                'a_parking' => $a_parking,
                'description' => $description
            ]);
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }

        public function insertAnnonce($id_logement, $creer_a, $loueur, $a_colocation, $disponibilite, $nb_personnes, $statut, $info_complementaire) {
            /*
            * Insérer une nouvelle annonce dans la table Annonce
            * @param int $id_logement - ID du logement
            * @param string $creer_a - Date de création
            * @param int $loueur - ID du loueur
            * @param bool $a_colocation - Statut colocation de l'annonce
            * @param string $disponibilite - Date de disponibilité
            * @param int $nb_personnes - Nombre de personnes
            * @param string $statut - Statut de l'annonce
            * @param string $info_complementaire - Informations complémentaires
            * @return bool - Retourne true en cas de succès, false en cas d'échec
            */
            try {
            $sql = "INSERT INTO Annonce (id_logement, creer_a, loueur, a_colocation, disponibilite, nb_personnes, statut, info_complementaire) VALUES (:id_logement, :creer_a, :loueur, :a_colocation, :disponibilite, :nb_personnes, :statut, :info_complementaire)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'id_logement' => $id_logement,
                'creer_a' => $creer_a,
                'loueur' => $loueur,
                'a_colocation' => $a_colocation,
                'disponibilite' => $disponibilite,
                'nb_personnes' => $nb_personnes,
                'statut' => $statut,
                'info_complementaire' => $info_complementaire
            ]);
            } catch (PDOException $e) {
                echo "Erreur PDO: " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }
}


?>