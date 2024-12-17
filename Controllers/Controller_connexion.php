<?php
class Controller_connexion extends Controller {
    public function action_default() {
        $this->action_connexion();
    }

    public function action_connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model = Model::getModel();
            $user = $model->getUserByEmail($email);

            if ($user && password_verify($password, $user['mdp'])) {
                $roleManager = new RoleManager();
                $roleManager->redirectToRolePage($user['id']);
            } else {
                $data = ["erreur" => "Email ou mot de passe incorrect"];
                $this->render("connexion", $data);
            }
        } else {
            $data = ["erreur" => false];
            $this->render("connexion", $data);
        }
    }

    public function action_seconnecter(){
    $message = "";
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
}}}
?>