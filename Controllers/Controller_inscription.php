<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Aidappart/Utils/vendor/autoload.php';  #envoie de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'Utils/vendor/PHPMailer/src/Exception.php';
require 'Utils/vendor/PHPMailer/src/PHPMailer.php';
require 'Utils/vendor/PHPMailer/src/SMTP.php';


class Controller_inscription extends Controller {

    private $verificationCode;

    public function action_default() {
        $this->action_inscription();
    }

    public function action_inscription() {
        $data = ["erreur" => false];
        $this->render("inscription", $data);
    }
    
    public function action_sinscrire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = Model::getModel();
            // Récupération des données POST
            $status = $_POST['status'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['phone'];
            $actif = 0; // Par défaut
            $email = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $mdp_confirmation = $_POST["mdp_confirmation"];

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

            if ($mdp_confirmation != $mdp) {
                $data = ["message"=> "Les deux mots de passe doivent être identiques"];
                $this->render("inscription", $data);
                exit;
            }

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data = ["message" => "L'adresse email est invalide."];
                $this->render("inscription", $data);
                exit;
            }

            // Téléphone
            if (strlen($telephone) != 9 && strlen($telephone) != 10) {
                $data = ["message" => "Le numéro de téléphone doit contenir le bon nombre de chiffres."];
                $this->render("inscription", $data);
                exit;
            }

            // Vérification de l'existence d'un utilisateur
            $UtilisateurExistant = $model->doublon($email, $telephone);
            if ($UtilisateurExistant) {
                $data = ["message" => "Email ou téléphone déjà existant."];
                $this->render("inscription", $data);
                exit;
            }

            // Insertion dans la base de données
            $reussie = $model->insertPersonne($nom, $prenom, $email, $actif, $telephone, $mdp);
            if ($reussie) {
                session_start();
                $_SESSION['idpersonne'] = $model->getIdPersonne($email);
                $_SESSION['prenom'] = $prenom;
                $data = ["message" => null];

                $this->verificationCode = random_int(100000, 999999); // Génère un nombre entre 100000 et 999999
                $_SESSION['verificationCode'] = $this->verificationCode;  // Stocke la valeur générée dans la session
                $this->envoie_mail($nom, $email, "Confirmation de votre inscription", "Votre code de verification est : " . $this->verificationCode);// Envoyer l'e-mail de confirmation

                $this->render("confirmation_mail", $data);
            } else {
                echo "Erreur lors de l'inscription.";
            }

        }
    }

    public function envoie_mail($nom_to, $mail_to, $subject, $message) {
        $mail = new PHPMailer(true);
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de GMAIL
            $mail->SMTPAuth = true;
            $mail->Username = "felix.blanchier@gmail.com";
            $mail->Password = "hwrjfumzdlaqhezu";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('felix.blanchier@gmail.com', 'Aidappart');
            $mail->addAddress($mail_to, $nom_to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Envoyer l'e-mail
            $mail->send();

        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }

    public function changebdd(){

        if ($_SESSION['verificationCode']==$_POST['verification_code']){
            $model = Model::getModel();
            $model->change_personne_actif($_SESSION['idpersonne'], 1);
            $data = ["erreur" => false]; 
            $this->render("accueil", $data);
        }

        else{
            $data = ["message" => "Le mots de passe est incorrect."];
            $this->render("view_confirmation_mail", $data);


        }
    }
}
?>
