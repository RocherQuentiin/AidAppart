<?php
class Controller_mdp_oublie extends Controller {
    public function action_default() {
        $this->action_mdp_oublie();
    }

    public function action_mdp_oublie() {
        $data = ["erreur" => false];
        $this->render("mdp_oublie", $data);
    }
    public function action_reset_mdp() {
        // Vérifiez si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connexion à la base de données
            $model = Model::getModel();

            // Récupérer l'email envoyé par le formulaire
            $email = $_POST['email'];

            // Récupérer l'email envoyé par le formulaire
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            if (!$email) {
                echo "Adresse e-mail invalide.";
                return;
            }

            // Vérifier si l'email existe dans la base de données
            try {
                $stmt = $model->getDb()->prepare("SELECT id FROM Personne WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user) {
                    // Générer un jeton unique pour la réinitialisation
                    $token = bin2hex(random_bytes(16));
                    $resetLink = "https://AidAppart.com/reset_password.php?token=$token";

                    // Enregistrer le jeton dans la base de données avec une expiration (par exemple, 1 heure)
                    $stmt = $model->getDb()->prepare(
                        "INSERT INTO Password_Reset_Tokens (user_id, token, expires_at) VALUES (?, ?, ?)"
                    );
                    $expiresAt = date("Y-m-d H:i:s", strtotime('+1 hour'));
                    $stmt->execute([$user['id'], $token, $expiresAt]);

                // Préparer le message
                $subject = "Réinitialisation de votre mot de passe";
                $message = "Bonjour,\n\nCliquez sur le lien suivant pour réinitialiser votre mot de passe : $resetLink\n\nCe lien est valable pendant 1 heure.\n\nMerci.";
                $headers = "From: noreply@AidAppart.com";

                // Envoyer l'email
                if (mail($email, $subject, $message, $headers)) {
                    echo "Un email de réinitialisation a été envoyé à $email.";
                } else {
                    echo "Échec de l'envoi de l'email.";
                }
            } else {
                echo "Cet email n'existe pas dans notre base de données.";
            }
        } else {
            echo "Aucune donnée reçue.";
            }
        }
    }
}
?>
