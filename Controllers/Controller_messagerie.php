<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Controller_messagerie extends Controller {

    public function action_default() {
        $this->action_messagerie();
    }

    public function action_messagerie() {
        $m = Model::getModel();
        $idUtilisateurActif = $_SESSION['idpersonne']; // Unifier les clés de session
        $TousLesReponses = $m->ReponseRecu($idUtilisateurActif);
        $data = [
            'utilisateurs' => $m->allUser(),
            'idUtilisateurActif' => $idUtilisateurActif,
            'TousLesReponses' => $TousLesReponses
        ];
        $this->render("messagerie", $data);
    }

    public function action_envoyerMessage() {
        $model = Model::getModel();
        $idUtilisateurActif = $_SESSION['idpersonne']; // Unifier les clés de session

        if ($idUtilisateurActif !== null && isset($_POST['send']) && $_POST['send'] == 1) {
            if (!empty($_POST['MessageDestinataire']) && !empty($_POST['MessageContenu'])) {
                $messagerieDestinataire = intval($_POST['MessageDestinataire']);
                $messagerieContenu = $_POST['MessageContenu'];


                    try {
                        $model->InsertionDonnees($idUtilisateurActif, $messagerieDestinataire, $messagerieContenu);
                        echo "<span id='messageReussie' style='display: block; color: green;'>Le message a bien été envoyé</span>";
                        // Option de redirection ou autre logique
                        header('Location: ?controller=messagerie&action=messagerie');
                        exit;
                    } catch (Exception $e) {
                        echo 'Erreur SQL : ', $e->getMessage();
                    }

            } else {
                echo "Tous les champs sont obligatoires.";
            }
        }
    }
}
?>
