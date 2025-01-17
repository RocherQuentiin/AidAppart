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

            if (strlen($new_password) < 6) {
                $data['erreur'] = "Le mot de passe doit contenir au moins 6 caractères.";
                $this->render("changement_mdp", $data);
                return;
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
