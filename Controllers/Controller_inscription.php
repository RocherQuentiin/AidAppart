<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'Controller.php';

class Controller_inscription extends Controller {

    private $verificationCode;

    public function action_default() {
        print_r("test");
        $this->action_inscription();
    }

    public function action_inscription() {
        print_r("test");
        $data = ["erreur" => false];
        $this->render("inscription", $data);
    }

    public function view_confirmation_mail() {
        $data = []; 
        $this->render("view_confirmation_mail", $data);
    }

    // Fonction pour envoyer un e-mail avec un code de vérification
    public function envoyerCodeVerification($email) {
        // Générer un code aléatoire à 6 chiffres
        
        $verificationCode = rand(100000, 999999);
    
        // Envoyer l'email
        $subject = "Code de vérification";
        $message = "Votre code de vérification est : $verificationCode";
        $headers = "From: felix@blanchier.com";



        if (mail($email, $subject, $message, $headers)) {
            // Si l'email a été envoyé avec succès, rediriger vers la page de confirmation avec le code dans l'URL
            header("Location: http://localhost:8000/GitHub/AidAppart/index.php?controller=inscription&action=view_confirmation_mail");
            exit();
        } else {
            // Si l'email n'a pas pu être envoyé
            $data = ['message' => 'Une erreur est survenue lors de l\'envoi de l\'e-mail.'];
            $this->render('inscription', $data);
        }
    }
    
    

    // Fonction pour valider le code de vérification
    public function validerCodeVerification() {
        session_start(); // Démarrer la session pour accéder au code stocké
        
        // Récupérer le code entré par l'utilisateur
        $codeEntree = $_POST['verification_code'];
        
        // Vérifier si le code correspond à celui stocké dans la session
        if ($_SESSION['verification_code'] == $codeEntree) {
            // Code valide
            echo "L'adresse e-mail a été vérifiée avec succès!";
            // Rediriger ou effectuer une action supplémentaire (par exemple, marquer l'utilisateur comme vérifié dans la base de données)
            unset($_SESSION['verification_code']);  // Supprimer le code de la session après validation
        } else {
            // Code invalide
            $data = ['message' => 'Le code de vérification est incorrect.'];
            $this->render('view_confirmation_mail', $data);  // Afficher à nouveau la vue avec un message d'erreur
        }
    }

    public function action_sinscrire() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = Model::getModel();
            // Récupération des données POST
            $status = $_POST['status'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['pays-code'] . $_POST['phone'];
            $actif = True; // Par défaut
            $email = $_POST['mail'];
            $mdp = $_POST['mdp'];
            


            // Validation des champs
            if (!preg_match("/^[a-zA-Zà-ÿÀ-Ÿ\-'\s]+$/", $prenom) || empty($prenom)) {
                $data = ['message' => 'Le prénom fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return; 
            }

            if (!preg_match("/^[a-zA-Zà-ÿÀ-Ÿ\-'\s]+$/", $nom) || empty($nom)) {
                $data = ['message' => 'Le nom fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return; 
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $data = ['message' => 'L\'email fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return; 
            }

            if (!preg_match("/^[0-9\s\+\-]+$/", $telephone) || empty($telephone)) {
                $data = ['message' => 'Le téléphone fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return; 
            }

            if (strlen($mdp) < 6) {
                $data = ['message' => 'Le mot de passe doit comporter au moins 6 caractères.'];
                $this->render('inscription', $data);
                return; 
            }

            // Envoie de mail pour la vérification
#            $this->envoyerCodeVerification($email);

            // Insérer dans la base de données
            $reussie = $model->insertPersonne($nom, $prenom, $email, $actif, $telephone, $mdp);

            if ($reussie) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            echo "Méthode non autorisée.";
        }
    }
}

?>