<?php
session_start();
class Controller_annonces extends Controller {
    
    public function action_default() {
        $this->action_annonces();
    }

    public function action_annonces() {
        $model = Model::getModel();
        $annonce = $model->getAnnonceById($_GET["id"]);

        if ($annonce) {
            $annonce['est_meuble'] = $annonce['est_meuble'] ? 'Oui' : 'Non';
            $annonce['est_accessible_PMR'] = $annonce['est_accessible_PMR'] ? 'Oui' : 'Non';
            $annonce['a_parking'] = $annonce['a_parking'] ? 'Oui' : 'Non';
            $annonce['a_WIFI'] = $annonce['a_WIFI'] ? 'Oui' : 'Non';
            $annonce = $this->get_logements_adresse([$annonce])[0];
            $data = ["erreur" => false, 
                 "annonces" => $annonce,
                 "id_annonces" => $_GET["id"]];

            $this->render("annonces", $data);
        } else {
            echo "Annonce introuvable.";
        }
    
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

