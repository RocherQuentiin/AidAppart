<?php

class Controller_accueil extends Controller {
    public function action_default() {
        $this->action_accueil();
    }

    public function action_accueil() {
        $data = ["erreur" => false];
        $this->render("accueil", $data);
    }
}

?>