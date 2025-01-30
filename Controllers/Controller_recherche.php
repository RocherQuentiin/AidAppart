<?php

class Controller_recherche extends Controller {
    public function action_default() {
        $this->action_recherche();
    }

    public function action_recherche() {
        $data = ["erreur" => false];
        $this->render("recherche", $data);
    }
}

?>
