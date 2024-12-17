<?php
class Controller_connexion extends Controller {
    public function action_default() {
        $this->action_connexion();
    }

    public function action_connexion() {
        $data = ["erreur" => false];
        $this->render("connexion", $data);
    }
}

?>