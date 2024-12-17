<?php
require_once 'Utils/config.php';

class Model {
    private $db;
    private static $instance = null;

    private function __construct() {
        /*
        * Connexion à la base de données avec les informations de connexion définies dans config.php
        */
        global $servername, $username, $password, $dbname;

        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->query("SET NAMES 'utf8'");
        /*
        echo DB_HOST;
        echo DB_NAME;
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        echo $dsn;
        $this->db = new db($dsn, DB_USER, DB_PASS);
        $this->db->setAttribute(db::ATTR_ERRMODE, db::ERRMODE_EXCEPTION);*/
    }

    public static function getModel() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function selectAllFromTable($table) {
        /*
        * Sélectionner toutes les entrées de la table spécifiée
        * @param string $table - Nom de la table
        * @return array - Tableau contenant toutes les entrées de la table
        */
        $stmt = $this->db->query("SELECT * FROM " . $table);
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
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Erreur db : " . $e->getMessage();
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
                $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
                $sql = "INSERT INTO Personne (nom, prénom, email, actif, telephone, mdp) VALUES (:nom, :prenom, :email, :actif, :telephone, :mdp)";
                $stmt = $this->db->prepare($sql);
                return $stmt->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'actif' => $actif,
                    'telephone' => $telephone,
                    'mdp' => $hashedMdp
                ]);
            } catch (PDOException $e) {
                echo "Erreur db : " . $e->getMessage();
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
            $stmt = $this->db->prepare($sql);
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
                echo "Erreur db : " . $e->getMessage();
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
            $stmt = $this->db->prepare($sql);
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
                echo "Erreur db: " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }

        public function selectDistinctFromTable($table, $column, $order_by=null) {
            /*
            * Sélectionner des valeurs distinctes d'une colonne spécifiée dans une table spécifiée
            * @param string $table - Nom de la table
            * @param string $column - Nom de la colonne
            * @return array - Tableau contenant les valeurs distinctes de la colonne
            */
            if ($order_by) {
                $stmt = $this->db->query("SELECT DISTINCT $column FROM $table ORDER BY $order_by");
            } else {
                $stmt = $this->db->query("SELECT DISTINCT $column FROM $table");
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function selectMinMaxFromTable($table, $column) {
            /*
            * Sélectionner les valeurs minimales et maximales d'une colonne spécifiée dans une table spécifiée
            * @param string $table - Nom de la table
            * @param string $column - Nom de la colonne
            * @return array - Tableau contenant les valeurs minimales et maximales de la colonne
            */
            $stmt = $this->db->query("SELECT MIN($column) as min, MAX($column) as max FROM $table");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function selectFieldsFromTable($table, $fields, $conditions = []) {
            /*
            * Sélectionner des champs spécifiques d'une table spécifiée avec des conditions optionnelles
            * @param string $table - Nom de la table
            * @param array $fields - Tableau des champs à sélectionner
            * @param array $conditions - Tableau des conditions (facultatif)
            * @return array - Tableau contenant les résultats de la sélection
            */
            $fieldsList = implode(", ", $fields);
            echo $fieldsList;
            $sql = "SELECT $fieldsList FROM $table";

            if (!empty($conditions)) {
                $conditionsList = [];
                foreach ($conditions as $key => $value) {
                    $conditionsList[] = "$key = :$key";
                }
                $sql .= " WHERE " . implode(" AND ", $conditionsList);
            }

            try {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($conditions);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur db : " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return false;
            }
        }

        public function searchLogements($criteria) {
            $query = "SELECT * FROM Logement WHERE 1=1"; // 1=1 pour éviter les erreurs de syntaxe si aucune condition n'est ajoutée
            if (!empty($criteria['type'])) {
                $query .= " AND type = :type";
            }
            if (!empty($criteria['surface'])) {
                $query .= " AND surface >= :surface";
            }
            if (!empty($criteria['loyerMax'])) {
                $query .= " AND loyer <= :loyerMax";
            }
            if (!empty($criteria['loyerMin'])) {
                $query .= " AND loyer >= :loyerMin";
            }
            if (!empty($criteria['nbPieces'])) {
                $query .= " AND nb_pieces = :nbPieces";
            }
            if (!empty($criteria['surfaceMin'])) {
                $query .= " AND surface >= :surfaceMin";
            }
            if (!empty($criteria['surfaceMax'])) {
                $query .= " AND surface <= :surfaceMax";
            }
            if (!empty($criteria['wifi'])) {
                $query .= " AND a_wifi = :wifi";
            }
            if (!empty($criteria['meuble'])) {
                $query .= " AND est_meuble = :meuble";
            }
            if (!empty($criteria['accessiblePMR'])) {
                $query .= " AND est_accessible_PMR  = :accessiblePMR";
            }
            if (!empty($criteria['parking'])) {
                $query .= " AND a_parking = :parking";
            }
        
            $stmt = $this->db->prepare($query);
            if (!empty($criteria['type'])) {
                $stmt->bindValue(':type', $criteria['type']);
            }
            if (!empty($criteria['surface'])) {
                $stmt->bindValue(':surface', $criteria['surface']);
            }
            if (!empty($criteria['loyerMax'])) {
                $stmt->bindValue(':loyerMax', $criteria['loyerMax']);
            }
            if (!empty($criteria['loyerMin'])) {
                $stmt->bindValue(':loyerMin', $criteria['loyerMin']);
            }
            if (!empty($criteria['nbPieces'])) {
                $stmt->bindValue(':nbPieces', $criteria['nbPieces']);
            }
            if (!empty($criteria['surfaceMin'])) {
                $stmt->bindValue(':surfaceMin', $criteria['surfaceMin']);
            }
            if (!empty($criteria['surfaceMax'])) {
                $stmt->bindValue(':surfaceMax', $criteria['surfaceMax']);
            }
            if (!empty($criteria['wifi'])) {
                $stmt->bindValue(':wifi', $criteria['wifi'] == '1' ? 1 : 0);
            }
            if (!empty($criteria['meuble'])) {
                $stmt->bindValue(':meuble', $criteria['meuble'] == '1' ? 1 : 0);
            }
            if (!empty($criteria['accessiblePMR'])) {
                $stmt->bindValue(':accessiblePMR', $criteria['accessiblePMR'] == '1' ? 1 : 0);
            }
            if (!empty($criteria['parking'])) {
                $stmt->bindValue(':parking', $criteria['parking'] == '1' ? 1 : 0);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function email_exist($email) {
            /*
            * Vérifie si un email existe dans la table Personne
            * @param string $email - L'email à vérifier
            * @return mixed - Retourne l'ID de l'utilisateur si l'email existe, sinon false
            */
            try {
                // Préparer la requête SQL
                $stmt = $this->db->prepare("SELECT id FROM Personne WHERE email = :email");
                
                // Lier le paramètre email
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                
                // Exécuter la requête
                $stmt->execute();
                
                // Récupérer le résultat
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                // Si un utilisateur est trouvé, retourner son ID
                if ($user) {
                    return $user['id'];
                }
        
                // Si l'email n'existe pas
                return false;
        
            } catch (PDOException $e) {
                // Gérer l'exception en cas d'erreur de la base de données
                echo "Erreur db : " . $e->getMessage();
                return false;
            } catch (Exception $e) {
                // Gérer l'exception générique
                echo "Erreur : " . $e->getMessage();
                return false;
            }

        }
        public function personneConnexion($email) {
            $stat = $this->db->prepare('SeLECT * FROM Personne WHERE email = :email');
            $stat-> execute(['email' => $email]);
            return $stat->fetch(PDO::FETCH_ASSOC);
        }
    }       
    public function doublon($email, $telephone) {
        $stmt = $this->db->prepare("SELECT * FROM Personne WHERE email = :email OR telephone = :telephone");
        $stmt->execute([":email" => $email, ":telephone"=> $telephone]);
        return $stmt->rowCount() > 0;
    }
}
?>