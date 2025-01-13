<?php
class Controller_mdp_oublie extends Controller {
    public function action_default() {
        $this->action_mdp_oublie();
    }

    public function action_mdp_oublie() {
        // Afficher la page de demande de réinitialisation de mot de passe
        $data = ["erreur" => false];
        $this->render("mdp_oublie", $data);
    }

    public function action_reset_mdp() {
        // Vérifiez si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connexion au modèle
            $model = Model::getModel();

            // Récupérer l'email envoyé par le formulaire et valider l'email
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            // Si l'email n'est pas valide
            if (!$email) {
                echo "Adresse e-mail invalide.";
                return;
            }

            // Vérifier si l'email existe dans la base de données via le modèle
            $userId = $model->email_exist($email);
            
            if ($userId) {
                // Générer un jeton unique pour la réinitialisation
                /*
                $token = bin2hex(random_bytes(16));
                $resetLink = "https://AidAppart.com/reset_password.php?token=$token";
                */
                try {
                    // Enregistrer le jeton dans la base de données avec une expiration (par exemple, 1 heure)
                    /*
                    $stmt = $model->getDb()->prepare(
                        "INSERT INTO Password_Reset_Tokens (user_id, token, expires_at) VALUES (?, ?, ?)"
                    );
                
                    $expiresAt = date("Y-m-d H:i:s", strtotime('+1 hour'));
                    $stmt->execute([$userId, $token, $expiresAt]);
                    */

                    // Préparer le message
                    $subject = "Réinitialisation de votre mot de passe";
                    $message = "Bonjour,\n\nCliquez sur le lien suivant pour réinitialiser votre mot de passe : \n\nCe lien est valable pendant 1 heure.\n\nMerci.";
                    $headers = "From: hippolyte.danre@gmail.com";
                    print_r($email);
                    print_r($subject);
                    print_r($message);
                    print_r($headers);

                    // Envoyer l'email
                    if (mail($email, $subject, $message, $headers)) {
                        echo "Un email de réinitialisation a été envoyé à $email.";
                    } else {
                        echo "Échec de l'envoi de l'email.";
                    }

                } catch (PDOException $e) {
                    echo "Erreur lors de l'enregistrement du jeton : " . $e->getMessage();
                }
            } else {
                // Si l'email n'existe pas dans la base de données
                echo "Cet email n'existe pas dans notre base de données.";
            }
        } else {
            echo "Aucune donnée reçue.";
        }
    }
}
require_once 'Model/PersonneModel.php';
require_once 'Services/Mailer.php';

class MdpOublieController
{
    public function resetMdp()
    {
        if (isset($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse email invalide.";
                require 'View/reset_mdp.php';
                return;
            }

            $personneModel = new PersonneModel();
            $user = $personneModel->getUserByEmail($email);

            if ($user) {
                // Générer un token
                $token = bin2hex(random_bytes(32));
                $personneModel->storeResetToken($email, $token);

                // Envoi de l'email
                $mailer = new Mailer();
                $resetLink = "http://127.0.0.1/path/?controller=mdp_oublie&action=changeMdp&token=" . $token;
                $mailer->sendResetPasswordEmail($email, $resetLink);

                $success = "Un email avec un lien de réinitialisation a été envoyé.";
            } else {
                $error = "Adresse email non trouvée.";
            }
        }
        require 'View/reset_mdp.php';
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