<?php



class Controller_annonces extends Controller {
    
    public function action_default() {
        $this->action_annonces();
    }

    public function action_annonces() {

        $model = Model::getModel();
        $annonce = $model->getAnnonceById(3);

        if ($annonce) {
            $annonce['est_meuble'] = $annonce['est_meuble'] ? 'Oui' : 'Non';
            $annonce['est_accessible_PMR'] = $annonce['est_accessible_PMR'] ? 'Oui' : 'Non';
            $annonce['a_parking'] = $annonce['a_parking'] ? 'Oui' : 'Non';
            $annonce['a_WIFI'] = $annonce['a_WIFI'] ? 'Oui' : 'Non';
            // Charger la vue
            require 'views/view_annonces.php';
        } else {
            echo "Annonce introuvable.";
        }
    
    }

}
?>

