<?php



class Controller_annonces extends Controller {
    public function action_default() {
        $this->action_annonces();
    }

    public function action_annonces() {
        $data = ["erreur" => false];
        $this->render("annonces", $data);
    }
}



?>