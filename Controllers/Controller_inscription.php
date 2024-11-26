<?php

class Controller_inscription extends Controller {
    public function action_default() {
        $this->action_inscription();
    }

    public function action_inscription() {
        $data = ["erreur" => false];
        $this->render("inscription", $data);
    }

    public function action_sinscrire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = Model::getModel();

            // Récupération des données POST
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $actif = $_POST['actif'];
            $telephone = $_POST['telephone'];
            $mdp = $_POST['mdp'];

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