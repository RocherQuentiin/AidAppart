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
            $UtilisateurExistant=$model->doublon($email,$telephone);


            if ($UtilisateurExistant) {
                echo "Email ou téléphone déjà existant.";
            } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "L'adresse email est invalide ou vide.";
            } else {
                // Insérer la personne si l'email est valide et l'utilisateur n'existe pas
                $reussie = $model->insertPersonne($nom, $prenom, $email, $actif, $telephone, $mdp);
                if ($reussie) {
                    echo "Inscription réussie !";
                    $data = ["erreur" => false];
                    $this->render("accueil", $data);
                } else {
                    echo "Erreur lors de l'inscription.";
                }
            }
            
            }

            
            // Validation des champs

            #if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email) ) {
            #    $data = ['message' => 'L\'email fourni n\'est pas valide.'];
            #    $this->render('inscription', $data);
            #    return; 
            #}


            #if (strlen($mdp) < 6) {
            #    $data = ['message' => 'Le mot de passe doit comporter au moins 6 caractères.'];
            #    $this->render('inscription', $data);
            #    $data=
            #    return; 
            #}

            // Envoie de mail pour la vérification
#            $this->envoyerCodeVerification($email);

            // Insérer dans la base de données
    
    }
}   

?>