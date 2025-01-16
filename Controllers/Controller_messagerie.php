<?php
session_start();
class Controller_messagerie extends Controller {
    
    public function action_default() {
        $this->action_messagerie();
    }

    public function action_messagerie() { 
        $m = Model::getModel();
        $idUtilisateurActif = $_SESSION['idUtilisateur'];
        $TousLesReponses = $m->ReponseRecu($idUtilisateurActif);
        $data = [];
        $data = [
        'utilisateurs' => $m->allUser(),
        'idUtilisateurActif'=> $idUtilisateurActif,
        'TousLesReponses' => $TousLesReponses
        ];
        $this->render("messagerie", $data);
        
    }

  
    public function action_envoyermessagerie() {

        $model = Model::getModel();
        $idUtilisateurActif = $_SESSION['idUtilisateur'];

        if ($idUtilisateurActif !== null && isset($_POST['send']) && $_POST['send'] == 1) {
            $messagerieDestinataire = $_POST['messagerieDestinataire'];
            $messagerieDestinataire = intval($messagerieDestinataire);
            $messagerieContenu = $_POST['messagerieContenu'];
        
            $testUtilisateur = $model->VerifiUtilisateur($messagerieDestinataire);
     
            if ($testUtilisateur) {
                try {
                    $model->InsertionDonnees($idUtilisateurActif, $messagerieDestinataire, $messagerieContenu);
                    echo "Le messagerie a bien été envoyé";
                    $this->action_default();
                    
                    
                } catch (Exception $e) {
                    echo 'Erreur SQL : ',  $e->getmessagerie(), "\n";
                }  
            }
        }
    }





}
