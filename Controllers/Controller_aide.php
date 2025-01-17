<?php

class Controller_aide extends Controller {
    public function action_default() {
        $this->action_aide();
    }

    public function action_aide() {
        $data = ["erreur" => false];
        $this->render("aide", $data);
    }
}

?>

