<?php
class Controller_mdp_oublie extends Controller {
    public function action_default() {
        $this->action_mdp_oublie();
    }

    public function action_mdp_oublie() {
        $data = ["erreur" => false];
        $this->render("mdp_oublie", $data);
    }
}
