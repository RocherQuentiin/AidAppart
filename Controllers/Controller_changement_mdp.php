<?php
class Controller_changement_mdp extends Controller {
    public function action_default() {
        $this->action_changement_mdp();
    }

    public function action_changement_mdp() {
        $data = ["erreur" => false];

        if (isset($_GET['email'])) {
            $email = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $data['erreur'] = "Adresse e-mail invalide.";
            } else {
                $data['email'] = $email;
            }
        } else {
            $data['erreur'] = "Aucun email n'a été fourni.";
        }

        $this->render("changement_mdp", $data);
    }

    public function action_changer_mdp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $new_password = $_POST['new_password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            $data = ['email' => $email];
            if (empty($email)) {
                $data['erreur'] = "L'adresse e-mail est obligatoire.";
                $this->render("changement_mdp", $data);
                return;
            }

            if (empty($new_password) || empty($confirm_password)) {
                $data['erreur'] = "Veuillez remplir tous les champs.";
                $this->render("changement_mdp", $data);
                return;
            }

            if ($new_password !== $confirm_password) {
                $data['erreur'] = "Les mots de passe ne correspondent pas.";
                $this->render("changement_mdp", $data);
                return;
            }

            // Validation des champs obligatoires
            if (empty($nom) || empty($prenom) || empty($telephone) || empty($email) || empty($mdp) || empty($status)) {
                $data = ["message" => "Tous les champs sont obligatoires."];
                $this->render("inscription", $data);
                exit;
            }

            // Vérification de la sécurité du mot de passe
            if (!preg_match('/[A-Z]/', $mdp)) { // Au moins une majuscule
                $data = ["message" => "Le mot de passe doit contenir au moins une lettre majuscule."];
                $this->render("inscription", $data);
                exit;
            }

            if (strlen($mdp) < 8) { // Longueur minimale de 8 caractères
                $data = ["message" => "Le mot de passe doit contenir au moins 8 caractères."];
                $this->render("inscription", $data);
                exit;
            }
            if (!preg_match('/[0-9]/', $mdp)) { // Au moins un chiffre
                $data = ["message" => "Le mot de passe doit contenir au moins un chiffre."];
                $this->render("inscription", $data);
                exit;
            }

            $userModel = Model::getModel();
            if ($userModel->updatePassword($email, $hashed_password)) {
                $data['success'] = "Votre mot de passe a été changé avec succès.";
            } else {
                $data['erreur'] = "Une erreur s'est produite lors de la mise à jour du mot de passe.";
            }

            $this->render("changement_mdp", $data);
        } else {
            header("Location: index.php?action=changement_mdp");
        }
    }
}
