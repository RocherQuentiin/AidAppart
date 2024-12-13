<?php

class Controller_accueil extends Controller {
    public function action_default() {
        $this->action_accueil();
    }

    public function action_accueil() {
        $model = Model::getModel();
        $logements = $model->selectAllFromTable('Logement');
        $data = [
                    "logements" => $logements,
                ];
        $this->render("accueil", $data);
    }
}

?>