<?php
class Controller_pagelogement extends Controller {
    public function action_default() {
        $this->action_pagelogement();
    }

    public function action_pagelogement() {
        $model = Model::getModel();
        $logements = $model->selectAllFromTable('Logement');
        $types = $model->selectDistinctFromTable('Logement', 'type');
        $nbPieces = $model->selectDistinctFromTable('Logement', 'nb_pieces', 'nb_pieces');
        $minMaxSurface = $model->selectMinMaxFromTable('Logement', 'surface');
        $minMaxLoyer = $model->selectMinMaxFromTable('Logement', 'loyer');
        $minMaxCharges = $model->selectMinMaxFromTable('Logement', 'charges');

        $data = [
            "logements" => $logements,
            "types" => $types,
            "nbPieces" => $nbPieces,
            "minMaxSurface" => $minMaxSurface,
            "minMaxLoyer" => $minMaxLoyer,
            "minMaxCharges" => $minMaxCharges
        ];
        $this->render("pagelogement", $data);
    }
}
?>