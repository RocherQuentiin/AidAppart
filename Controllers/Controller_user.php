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

}
?>
