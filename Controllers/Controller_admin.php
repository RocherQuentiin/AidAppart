<?php

class Controller_admin extends Controller {
    public function action_default() {
        $this->action_admin();
    }

    public function action_admin() {
        $data = ["erreur" => false];
        $this->render("admin", $data);
    }
}

?>