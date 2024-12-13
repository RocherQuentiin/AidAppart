<?php
require_once __DIR__ . '/connexion_base.php'; // Inclut le fichier de connexion à la base de données

/**
 * Vérifie si un utilisateur existe avec l'email et le mot de passe fournis.
 * 
 * @param string $email
 * @param string $motDePasse
 * @return array|false Renvoie les informations de l'utilisateur ou false si non trouvé
 */
function verifierUtilisateur($email, $motDePasse) {
    $db = getConnexion(); // Récupère l'objet PDO pour la connexion
    $query = $db->prepare('SELECT * FROM personne WHERE email = ? AND mot_de_passe = ?');
    $query->execute([$email, md5($motDePasse)]); // md5() pour correspondre au mot de passe haché
    return $query->fetch(PDO::FETCH_ASSOC); // Renvoie un tableau associatif ou false
}
?>
