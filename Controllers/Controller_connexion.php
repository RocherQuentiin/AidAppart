<?php
<<<<<<< HEAD
require_once __DIR__ . '/model_connexion.php'; // Inclut le modèle

// Initialisation d'un message pour informer l'utilisateur
$message = "";

// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données du formulaire
    $email = $_POST['email'] ?? null;
    $motDePasse = $_POST['mot_de_passe'] ?? null;

    if ($email && $motDePasse) {
        // Vérifie les identifiants dans la base de données
        $utilisateur = verifierUtilisateur($email, $motDePasse);

        if ($utilisateur) {
            // Connexion réussie : initialise une session
            session_start();
            $_SESSION['utilisateur'] = $utilisateur; // Stocke l'utilisateur en session
            header('Location: tableau_de_bord.php'); // Redirige vers le tableau de bord
            exit;
        } else {
            // Erreur d'authentification
            $message = "Adresse email ou mot de passe incorrect.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

class Controller_connexion extends Controller {
    public function action_default() {
        $this->action_connexion();
    }

    public function action_connexion() {
        $data = ["erreur" => false];
        $this->render("connexion", $data);
    }
}

?>
>>>>>>> remotes/origin/pre_main
