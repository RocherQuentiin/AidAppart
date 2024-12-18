<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
            $actif = True; // Par défaut
            $email = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $mdp_confirmation=$_POST["mdp_confirmation"];

            // Validation des champs obligatoires
            if (empty($nom) || empty($prenom) || empty($telephone) || empty($email) || empty($mdp)) {
                $data = ["message" => "Tous les champs sont obligatoires."];
                $this->render("inscription", $data);
                exit;
            }

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data = ["message" => "L'adresse email est invalide."];
                $this->render("inscription", $data);
                exit;
            }

            // Vérification que les mots de passe soit identique
            if ($mdp_confirmation!=$mdp) {
                $data = ["message"=> "Les deux mots de passe doivent être identique"];
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
                $this->render("accueil", $data);
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }
}   

?>