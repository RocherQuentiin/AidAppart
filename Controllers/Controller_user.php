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

         // Utiliser la méthode getdataById pour récupérer les informations de l'utilisateur
         $userInfo = $model->getdataById('Personne', $idpersonne);

         if ($userInfo) {
             // Si les informations de l'utilisateur sont trouvées, les passer à la vue
             $data = [
                 "idpersonne" => $userInfo['id'],
                 "nom" => $userInfo['nom'],
                 "prenom" => $userInfo['prénom'],
                 "email" => $userInfo['email'],
                 "telephone" => $userInfo['telephone'],
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

}

?>