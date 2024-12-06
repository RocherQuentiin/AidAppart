<?php
class Controller_pagelogement extends Controller {
    public function action_default() {
        $this->action_pagelogement();
    }

    public function action_pagelogement() {
        $model = Model::getModel();
        $logements = $model->selectAllFromTable('Logement');
        $data = ["logements" => $logements];
        $this->render("pagelogement", $data);
    }
}

?>