<?php


class Controller_connexion extends Controller {
    public function action_default() {
        $this->action_connexion();
    }

    public function action_connexion() {
        $data = ["erreur" => false];
        $this->render("connexion", $data);
    }

    public function action_seconnecter() {

        $model = Model::getModel();
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        $utilisateur = $model->UtilisateurConnexion($email);

        if  ($utilisateur && password_verify($mdp, $utilisateur['mdp'])) {
            $idUtilisateur= $utilisateur['utilisateurID'];
            $_SESSION['idUtilisateur'] = $idUtilisateur;
            $data = ["erreur" => false];
            $this->render("accueil",$data);
        }    
        else {
            $data = ["erreur" => true];
            $this->render("connexion",$data);
            echo "E-mail ou mot de passe incorect.";
        }    
    }
}
?>