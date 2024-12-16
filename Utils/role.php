<?php
require_once 'config.php';

class RoleManager {
    private $db;

    public function __construct() {
        global $servername, $username, $password, $dbname;
        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function assignRole($userId, $roleId) {
        $sql = "INSERT INTO Personne_Role (id_personne, id_role) VALUES (:userId, :roleId)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['userId' => $userId, 'roleId' => $roleId]);
    }

    public function getUserRoles($userId) {
        $sql = "SELECT Role.nom FROM Personne_Role 
                JOIN Role ON Personne_Role.id_role = Role.id 
                WHERE Personne_Role.id_personne = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasRole($userId, $roleName) {
        $sql = "SELECT COUNT(*) FROM Personne_Role 
                JOIN Role ON Personne_Role.id_role = Role.id 
                WHERE Personne_Role.id_personne = :userId AND Role.nom = :roleName";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['userId' => $userId, 'roleName' => $roleName]);
        return $stmt->fetchColumn() > 0;
    }

    public function getRolePage($userId) {
        $roles = $this->getUserRoles($userId);
        foreach ($roles as $role) {
            switch ($role['nom']) {
                case 'Admin':
                    return '/admin_dashboard.php';
                case 'Propriétaire':
                    return '/proprietaire_dashboard.php';
                case 'Etudiant':
                    return '../?controller=pagelogement&action=pagelogementController';
                case 'Visiteur':
                    return '../index.php';
                default:
                    return '../index.php';
            }
        }
        return '/default_dashboard.php'; // Fallback in case no roles are found
    }
}