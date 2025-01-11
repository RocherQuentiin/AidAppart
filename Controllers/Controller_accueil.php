<?php

class Controller_accueil extends Controller {
    public function action_default() {
        $this->action_accueil();
    }

    public function action_accueil() {
        $model = Model::getModel();
        $logements = $model->selectTypesWithMostLogement();
        $villes = $model->selectVillesWithMostLogement();
        $data = [
            "logements" => $logements,
            "villes" => $villes,
        ];
        $this->render("accueil", $data);

    }
}


?>