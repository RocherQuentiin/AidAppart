<?php
session_start();

class Controller_user extends Controller {
    public function action_default() {
        $this->action_user();
    }

    public function action_user() {
        $idpersonne = $_SESSION['idpersonne'];

        // Récupérer le modèle
        $model = Model::getModel();

        // Récupérer les informations de l'utilisateur
        $userInfo = $model->getdataById('Personne', $idpersonne);
        // Récupérer les logements de l'utilisateur
        $logements = $model->getUserLogements($idpersonne);

        if ($userInfo) {
            // Si les informations de l'utilisateur sont trouvées, les passer à la vue
            $data = [
                "idpersonne" => $userInfo['id'],
                "nom" => $userInfo['nom'],
                "prenom" => $userInfo['prénom'],
                "email" => $userInfo['email'],
                "telephone" => $userInfo['telephone'],
                "logements" => $logements,
            ];
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            $data = [
                "erreur" => "Utilisateur non trouvé.",
            ];
        }

        // Rendu de la vue avec les données
        $this->render("user", $data);
    }

    public function action_update() {
        $idpersonne = $_SESSION['idpersonne']; // Récupérer l'ID de la session

        // Récupérer le modèle
        $model = Model::getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données soumises dans le formulaire
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];

            // Mettre à jour les informations dans la base de données
            $model->updatePersonne($idpersonne, $email, $nom, $prenom, $telephone);

            // Rediriger vers une page de confirmation ou afficher un message
            header("Location: ?controller=user&action=userController");
            exit();
        } else {
            // Récupérer les informations actuelles de la personne à partir de la base de données
            $personne = $model->getPersonneById($idpersonne);

            // Passer les données à la vue
            $data = [
                "personne" => $personne
            ];
            $this->render("user", $data); // Afficher le formulaire avec les données actuelles
        }
    }

    public function action_desactivateUser() {
        $model = Model::getModel();

        // Vérification si l'utilisateur est connecté
        if (!isset($_SESSION['idpersonne']) && !isset($_GET['userId'])) {
            header('Location: ?controller=connexion&action=connexionController');
            exit;
        }

        // Utilisation de l'ID de l'utilisateur soit depuis la session, soit depuis l'URL
        $user_id = isset($_GET['userId']) ? $_GET['userId'] : $_SESSION['idpersonne'];

        if (isset($_POST['deactivate_account']) || isset($_GET['userId'])) {
            $etat = 'inactif';
            $model->disableUser($user_id, $etat);

            // Détruire la session si l'utilisateur désactive son propre compte
            if (isset($_SESSION['idpersonne'])) {
                session_destroy();
            }

            header('Location: ?controller=connexion&action=connexionController');
            exit;
        }

        $user = $model->getdataById('Personne', $user_id);
        $data = [
            "user" => $user,
        ];
        $this->render("user", $data);
    }

    public function action_supprimerLogement() {
        if (!isset($_POST['logement_id'])) {
            // Gérer le cas où l'ID du logement n'est pas fourni
            header('Location: ?controller=user&action=profile');
            exit;
        }

        $logement_id = $_POST['logement_id'];
        $model = Model::getModel();

        // Suppression du logement
        $model->deleteById('Logement', $logement_id);

        // Redirection après suppression
        header('Location: ?controller=user&action=profile');
        exit;
    }
    
}
?>
