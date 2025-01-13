<?php



class Controller_annonces extends Controller {
    
    public function action_default() {
        $this->action_annonces();
    }

    public function action_annonces() {

        $model = Model::getModel();
        $annonce = $model->getAnnonceById(3);

        if ($annonce) {
            // Charger la vue
            require 'views/view_annonces.php';
        } else {
            echo "Annonce introuvable.";
        }
    
    }

}
?>

