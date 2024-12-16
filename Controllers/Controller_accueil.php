<?php

class Controller_accueil extends Controller {
    public function action_default() {
        $this->action_accueil();
    }

    public function action_accueil() {
        $model = Model::getModel();
        $logements = $model->selectTypesWithMostLogement();
        $villes = $model->selectVillesWithMostLogement();
        $tom = $model->selectTypesWithMostLogement();
        $data = [
            "logements" => $logements,
            "villes" => $villes,
            "tom" => $tom
        ];
        $this->render("accueil", $data);

    }
}


?>