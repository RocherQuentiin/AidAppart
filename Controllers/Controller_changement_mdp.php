<?php
class Controller_changement_mdp extends Controller {
    public function action_default() {
        $this->action_changement_mdp();
    }

    public function action_changement_mdp() {
        $data = ["erreur" => false];
        $this->render("changement_mdp", $data);
    }
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charger PHPMailer avec Composer

// Configuration de la base de données
$host = 'localhost';
$dbname = 'Aidappart';
$user = 'default_user';
$password = 'AidappartNova';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification si l'email existe
        $stmt = $pdo->prepare("SELECT id FROM Personne WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Génération du token sécurisé
            $token = bin2hex(random_bytes(32));
            $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

            // Insérer ou mettre à jour le token pour cet utilisateur
            $stmt = $pdo->prepare("
                INSERT INTO Password_Reset (email, token, expires_at)
                VALUES (:email, :token, :expires_at)
                ON DUPLICATE KEY UPDATE token = :token, expires_at = :expires_at
            ");
            $stmt->execute([
                ':email' => $email,
                ':token' => $token,
                ':expires_at' => $expires_at,
            ]);

            // Envoi de l'email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ton_email@gmail.com'; // Ton adresse email
                $mail->Password = 'ton_mot_de_passe'; // Mot de passe ou token SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('ton_email@gmail.com', 'Aidappart');
                $mail->addAddress($email);

                $resetLink = "http://localhost/reset_form.php?token=$token";

                $mail->Subject = 'Réinitialisation de votre mot de passe';
                $mail->Body = "Cliquez sur ce lien pour réinitialiser votre mot de passe : $resetLink";
                $mail->send();

                echo "Un email de réinitialisation a été envoyé.";
            } catch (Exception $e) {
                echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
            }
        } else {
            echo "Cet email n'existe pas dans notre base de données.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
