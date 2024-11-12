# Documentation de la classe Model

## Description
La classe `Model` fournit des opérations CRUD (Create, Read, Update, Delete) pour interagir avec une base de données MySQL. Elle utilise PDO pour se connecter à la base de données et exécuter des requêtes SQL.

## Propriétés
- `protected $pdo` : Instance de PDO utilisée pour la connexion à la base de données.

## Méthodes

### __construct()
Initialise une connexion à la base de données en utilisant les informations de connexion définies dans `config.php`. Définit le mode d'erreur de PDO sur `ERRMODE_EXCEPTION` pour gérer les erreurs de manière appropriée.

### selectAllFromTable($table)
Sélectionne toutes les entrées d'une table spécifiée.

- **Paramètres :**
    - `string $table` : Nom de la table.
- **Retourne :**
    - `array` : Tableau associatif contenant toutes les entrées de la table.

### deleteById($table, $id)
Supprime une entrée d'une table spécifiée avec l'ID spécifié.

- **Paramètres :**
    - `string $table` : Nom de la table.
    - `int $id` : ID de l'entrée à supprimer.

### insertPersonne($nom, $prenom, $email, $actif, $telephone, $mdp)
Insère une nouvelle personne dans la table `Personne`.

- **Paramètres :**
    - `string $nom` : Nom de la personne.
    - `string $prenom` : Prénom de la personne.
    - `string $email` : Email de la personne.
    - `bool $actif` : Statut actif de la personne.
    - `string $telephone` : Téléphone de la personne.
    - `string $mdp` : Mot de passe de la personne.
- **Retourne :**
    - `bool` : Retourne `true` en cas de succès, `false` en cas d'échec.

### insertLogement($type, $surface, $proprietaire, $loyer, $charges, $creer_a, $adresse, $est_meuble, $a_WIFI, $est_accessible_PMR, $nb_pieces, $a_parking)
Insère un nouveau logement dans la table `Logement`.

- **Paramètres :**
    - `string $type` : Type de logement.
    - `int $surface` : Surface du logement.
    - `int $proprietaire` : ID du propriétaire.
    - `int $loyer` : Loyer du logement.
    - `int $charges` : Charges du logement.
    - `string $creer_a` : Date de création.
    - `int $adresse` : ID de l'adresse.
    - `bool $est_meuble` : Statut meublé du logement.
    - `bool $a_WIFI` : Statut WiFi du logement.
    - `bool $est_accessible_PMR` : Accessibilité PMR du logement.
    - `int $nb_pieces` : Nombre de pièces du logement.
    - `bool $a_parking` : Statut parking du logement.
