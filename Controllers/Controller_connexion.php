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
    $personne = $model->personneConnexion($email); 

    if  ($personne && password_verify($mdp, $personne['mdp'])) { 
        $idpersonne= $personne['id']; 
        $_SESSION['idpersonne'] = $idpersonne; 
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