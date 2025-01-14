<?php
class Controller_changement_mdp extends Controller {
    public function action_default() {
        $this->action_changement_mdp();
    }

    public function action_changement_mdp() {
        $data = ["erreur" => false];
        $this->render("changement_mdp", $data);
    }



    public function changeMdp()
    {
        if (isset($_GET['token']) && !empty($_POST['new_password'])) {
            $token = htmlspecialchars($_GET['token']);
            $newPassword = htmlspecialchars($_POST['new_password']);

            $personneModel = new PersonneModel();
            $email = $personneModel->getEmailByToken($token);

            if ($email) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $personneModel->updatePassword($email, $hashedPassword);
                $personneModel->deleteToken($token);

                $success = "Votre mot de passe a été réinitialisé.";
                header("Location: ?controller=connexion&action=connexionController");
                return;
            } else {
                $error = "Lien invalide ou expiré.";
            }
        }
        require 'View/change_mdp.php';
    }
}    
?>