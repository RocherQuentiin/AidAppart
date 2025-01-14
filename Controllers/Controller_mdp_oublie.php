<?php
// Charger l'autoloader généré par Composer
require_once '../Aidappart/Utils/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'Utils/vendor/PHPMailer/src/Exception.php';
require 'Utils/vendor/PHPMailer/src/PHPMailer.php';
require 'Utils/vendor/PHPMailer/src/SMTP.php';

class Controller_mdp_oublie extends Controller {

    public function action_default() {
        $this->action_mdp_oublie();
    }

    public function action_mdp_oublie() {
        $data = ["erreur" => false];
        $this->render("mdp_oublie", $data);
    }

    // Fonction d'envoi d'email
    function envoie_mail($nom_to, $mail_to, $subject, $message) {
        $mail = new PHPMailer(true);
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de GMAIL
            $mail->SMTPAuth = true;

            $mail->Username = "hippolyte.danre@gmail.com"; // Votre email
            $mail->Password = "nxxl madj qfuh xcpy"; // Votre mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('hippolyte.danre@gmail.com', 'AidAppart');
            $mail->addAddress($mail_to, $nom_to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');

            // Envoyer l'e-mail
            $mail->send();
            return true; // Retourne true si l'email a été envoyé
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
            return false; // Retourne false en cas d'erreur
        }
    }

    public function action_reset_mdp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer l'email envoyé par le formulaire
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            // Si l'email est invalide
            if (!$email) {
                echo "Adresse e-mail invalide.";
                return;
            }

            // Générer le message de réinitialisation
            $subject = "Réinitialisation de votre mot de passe";
            $message = "Bonjour,<br><br>Cliquez sur le lien suivant pour réinitialiser votre mot de passe :<br><br>";
            $message .= "<a href='https://aidappart.herogu.garageisep.com/?controller=changement_mdp&action=changement_mdpController?email=$email'>Réinitialiser mon mot de passe</a><br><br>";
            
            $message .= "Ce lien est valable pendant 1 heure.<br><br>Merci.";

           // Envoi de l'email de réinitialisation
           if ($this->envoie_mail('Utilisateur', $email, $subject, $message)) {
            $data['success'] = "Un email de réinitialisation a été envoyé à $email.";
            $this->render("mdp_oublie", $data);
        } else {
            $data['erreur'] = "Échec de l'envoi de l'email.";
            $this->render("mdp_oublie", $data);
            }
        }
    }
}

?>