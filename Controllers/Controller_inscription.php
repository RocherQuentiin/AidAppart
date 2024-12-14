<?php

class Controller_inscription extends Controller {
    public function action_default() {
        $this->action_inscription();
    }

    public function action_inscription() {
        $data = ["erreur" => false];
        $this->render("inscription", $data);
    }

    public function view_confirmation_mail() {
        $data = []; // Ajoutez des données nécessaires à la vue si nécessaire
        $this->render("view_confirmation_mail", $data);
    }

    public function envoyerCodeVerification($email) {// Fonction pour envoyer un e-mail avec un code de vérification
        // Générer un code aléatoire à 6 chiffres
        $verificationCode = rand(100000, 999999);
        
        // Enregistrer ce code dans une session ou une base de données pour validation
        // Utiliser $_SESSION pour stocker le code temporairement
        session_start();
        $_SESSION['verification_code'] = $verificationCode;
        
        // Envoyer l'email
        $subject = "Code de vérification";
        $message = "Votre code de vérification est : $verificationCode";
        $headers = "From: no-reply@aidappart.com";
    
        if (mail($email, $subject, $message, $headers)) {
            // Si l'email a été envoyé avec succès, rediriger vers la page de confirmation
            header("Location: /GitHub/AidAppart/index.php?controller=inscription&action=view_confirmation_mail");
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
            $actif = True;//Par défaut
            $email = $_POST['mail'];
            $mdp = $_POST['mdp'];

            // Vérification si l'email existe déjà avec la fonction selectDistinctFromTable
#            $emailExist = $model->selectDistinctFromTable('Personne', 'email');
#            $emailExist = array_filter($emailExist, function($entry) use ($email) {
#                return $entry['email'] == $email;
#            });

            // Si l'email existe déjà, afficher un message d'erreur
#            if (!empty($emailExist)) {
#                $data = ['message' => 'Cet email est déjà utilisé.'];
#                $this->render('inscription', $data);
#                return;  // Arrêter l'exécution si l'email est déjà pris
#            }



            // Étape 1: Vérifier que le prénom contient uniquement des lettres (et éventuellement des espaces)
            if (!preg_match("/^[a-zA-Zà-ÿÀ-Ÿ\-'\s]+$/", $prenom) or empty($prenom)) {
                $data = ['message' => 'Le prénom fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return;  // Arrête l'exécution du code
            }

            // Étape 2: Vérifier que le nom contient uniquement des lettres (et éventuellement des espaces)
            if (!preg_match("/^[a-zA-Zà-ÿÀ-Ÿ\-'\s]+$/", $nom) or empty($nom)) {
                $data = ['message' => 'Le nom fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return;  // Arrête l'exécution du code
            }

            // Étape 3: Vérifier que l'email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) or empty($email)) {
                $data = ['message' => 'L\'email fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return;  // Arrête l'exécution du code
            }

            // Étape 4: Vérifier que le téléphone contient uniquement des chiffres (et peut-être des espaces ou des tirets)
            if (!preg_match("/^[0-9\s\+\-]+$/", $telephone) or empty($telephone)) {
                $data = ['message' => 'Le téléphone fourni n\'est pas valide.'];
                $this->render('inscription', $data);
                return;  // Arrête l'exécution du code
            }

            // Étape 5: Vérifier que le mot de passe est assez long (par exemple, au moins 6 caractères)
            if (strlen($mdp) < 6) {
                $data = ['message' => 'Le mot de passe doit comporter au moins 6 caractères.'];
                $this->render('inscription', $data);
                return;  // Arrête l'exécution du code
            }

            // Envoie de mail
            $this->envoyerCodeVerification($email);


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