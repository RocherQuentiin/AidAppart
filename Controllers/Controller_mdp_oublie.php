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
            $subject = "Changer de mot de passe";

            // Le contenu du message en HTML
            $message = "
            <html>
            <head>
                <title>Changer de mot de passe - AidAppart</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                    }
                    .email-container {
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                        border: 1px solid #ccc;
                        padding: 20px;
                        background-color:linear-gradient(180deg, rgba(171, 201, 89, 0.5) 23.5%, rgba(255, 255, 255, 0.5) 100%);
                    }
                    .header {
                        text-align: center;
                    }
                    .logo {
                        max-width: 200px;
                        height: auto;
                    }
                    .content {
                        margin-top: 20px;
                        font-size: 16px;
                    }
                    .cta-button {
                        display: inline-block;
                        background-color:#A9CA59;
                        color: #fff;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                        margin-top: 20px;
                    }
                    .cta-button:hover {
                        background-color:#23435C;
                    }
                    .footer {
                        font-size: 12px;
                        color: #888;
                        text-align: center;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='content'>
                        <p>Bonjour,</p>
                        <p>Cliquez sur le lien suivant pour réinitialiser votre mot de passe :</p>
                        <a href='http://localhost/AidAppart/?controller=changement_mdp&action=changement_mdpController&email=$email' class='cta-button'>Réinitialiser mon mot de passe</a>
                        <p>Ce lien est valable pendant 1 heure.</p>
                    </div>
                    <div class='footer'>
                        <p>Merci de faire confiance à <strong>AidAppart</strong></p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            // Pour envoyer le mail, vous devrez définir les headers pour indiquer que le message est en HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // En-tête supplémentaire pour l'objet
            $headers .= 'From: aidappart@exemple.com' . "\r\n"; // Remplacez par l'email d'expédition

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