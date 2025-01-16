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
         $logements = $model->selectAllFromTable('Logement');
         // Utiliser la méthode getdataById pour récupérer les informations de l'utilisateur
         $userInfo = $model->getdataById('Personne', $idpersonne);
        $logements = $model->getUserLogements($userInfo['id']);
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
     public function action_desactivateUser() {
         $model = Model::getModel();

         // Vérifier si l'utilisateur est connecté
         if (!isset($_SESSION['idpersonne'])) {
             header('Location: ?controller=connexion&action=connexionController');
             exit;
         }

         $user_id = $_SESSION['idpersonne'];

         // Vérifier si le bouton de désactivation a été soumis
         if (isset($_POST['deactivate_account'])) {
             // Appeler la méthode pour désactiver l'utilisateur
             $etat = 'inactif'; // Mettre l'état de l'utilisateur à "inactif"
             $model->disableUser($user_id, $etat);

             // Détruire la session pour déconnecter l'utilisateur
             session_destroy();
             header('Location: ?controller=connexion&action=connexionController');
             exit;
         }

         // Récupérer les informations de l'utilisateur
         $user = $model->getdataById('Personne', $user_id);
         $data = [
             "user" => $user,
         ];
         $this->render("user", $data);
     }



}

?>