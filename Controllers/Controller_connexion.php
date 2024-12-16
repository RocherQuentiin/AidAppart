<?php

<?php
require_once 'Utils/role.php';

class Controller_connexion extends Controller {
    public function action_default() {
        $this->action_connexion();
    }

    public function action_connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model = Model::getModel();
            $user = $model->getUserByEmail($email);

            if ($user && password_verify($password, $user['mdp'])) {
                $roleManager = new RoleManager();
                $roleManager->redirectToRolePage($user['id']);
            } else {
                $data = ["erreur" => "Email ou mot de passe incorrect"];
                $this->render("connexion", $data);
            }
        } else {
            $data = ["erreur" => false];
            $this->render("connexion", $data);
        }
    }
}

?>