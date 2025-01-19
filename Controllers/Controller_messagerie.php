<?php
session_start();

class Controller_messagerie extends Controller {

    public function action_default() {
        $this->action_messagerie();
    }

    public function action_messagerie() {
        $m = Model::getModel();
        $idUtilisateurActif = $_SESSION['idpersonne'];
        $TousLesReponses = $m->ReponseRecu($idUtilisateurActif);
        $data = [
            'utilisateurs' => $m->allUser(),
            'idUtilisateurActif' => $idUtilisateurActif,
            'TousLesReponses' => $TousLesReponses
        ];
        $this->render("messagerie", $data);
    }

   function action_envoyerMessage() {
           $model = Model::getModel();
           $idUtilisateurActif = $_SESSION['idpersonne'];
           $id_logement = $_GET['id']; // Récupère l'ID du logement depuis l'URL

           if ($idUtilisateurActif !== null && isset($_POST['message'])) {
               $messagerieContenu = $_POST['message'];

               // Récupérer l'ID du propriétaire du logement
               $messagerieDestinataire = $model->getUserIdByLogementId($id_logement);

               if ($messagerieDestinataire !== null) {
                   try {
                       $model->InsertionDonnees($idUtilisateurActif, $messagerieDestinataire, $messagerieContenu);
                       header('Location: ?controller=annonces&action=annonces&id=' . $id_logement . '&success=1');
                       exit;
                   } catch (Exception $e) {
                       echo 'Erreur SQL : ', $e->getMessage();
                   }
               } else {
                   echo "Propriétaire du logement non trouvé.";
               }
           } else {
               header('Location: ?controller=annonces&action=annonces&id=' . $id_logement . '&error=2');
               exit;
           }
       }

}
?>
