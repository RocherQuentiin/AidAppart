<?php
session_start();

class Controller_user extends Controller {

    public function action_default() {
        $this->action_user();
    }


    public function action_user() {
        $idpersonne = $_SESSION['idpersonne'];

        $model = Model::getModel();

        $userInfo = $model->getdataById('Personne', $idpersonne);
        $logements = $model->getUserLogements($idpersonne);
        $messages = $model->getMessagesByUserId($idpersonne);

        foreach ($messages as &$message) {
            $message['expediteur'] = $model->getUserInfoById($message['id_personne']);
            $message['destinataire'] = $model->getUserInfoById($message['id_personne_destinataire']);
        }

        if ($userInfo) {
            $data = [
                "idpersonne" => $userInfo['id'],
                "nom" => $userInfo['nom'],
                "prenom" => $userInfo['prénom'],
                "email" => $userInfo['email'],
                "telephone" => $userInfo['telephone'],
                "logements" => $logements,
                "messages" => $messages,
            ];
        } else {
            // Si l'utilisateur n'est pas trouvé
            $data = [
                "erreur" => "Utilisateur non trouvé.",
            ];
        }

        // Rendu de la vue avec les données
        $this->render("user", $data);
    }

    public function action_update() {
        $idpersonne = $_SESSION['idpersonne'];

        // Récupérer le modèle
        $model = Model::getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];

            $model->updatePersonne($idpersonne, $email, $nom, $prenom, $telephone);

            header("Location: ?controller=user&action=userController");
            exit();
        } else {
            $personne = $model->getPersonneById($idpersonne);

            // Passer les données à la vue
            $data = [
                "personne" => $personne
            ];
            $this->render("user", $data);
        }
    }

    // Désactivation de compte utilisateur
    public function action_desactivateUser() {
        $model = Model::getModel();

        // Vérification si l'utilisateur est connecté
        if (!isset($_SESSION['idpersonne']) && !isset($_GET['userId'])) {
            header('Location: ?controller=connexion&action=connexionController');
            exit;
        }

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

        // Récupérer les informations de l'utilisateur pour afficher la confirmation de désactivation
        $user = $model->getdataById('Personne', $user_id);
        $data = [
            "user" => $user,
        ];
        $this->render("user", $data);
    }

    // Suppression d'un logement
    public function action_supprimerLogement() {
        if (!isset($_POST['logement_id'])) {
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

    // Affichage des conversations de l'utilisateur
    public function action_afficherConversations() {
        $model = Model::getModel();
        $idUtilisateurActif = $_SESSION['idpersonne']; // Utilisateur connecté

        try {
            $userId = $idUtilisateurActif; // ID de l'utilisateur
            $conversations = $this->messagerieModel->getMessagesByUserId($userId);

            // Vérifier si des conversations sont trouvées
            if ($conversations) {
                $data = ['conversations' => $conversations];
                // Passer les conversations à la vue
                return $this->render('messages', $data);
            } else {
                echo "Aucune conversation trouvée pour cet utilisateur.";
            }
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
?>
