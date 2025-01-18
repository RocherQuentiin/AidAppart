<?php



class Controller_annonces extends Controller {
    
    public function action_default() {
        $this->action_annonces();
    }

    public function action_annonces() {
        

        $model = Model::getModel();
        $annonce = $model->getAnnonceById($_GET["id"]);

        if ($annonce) {
            $annonce['est_meuble'] = $annonce['est_meuble'] ? 'Oui' : 'Non';
            $annonce['est_accessible_PMR'] = $annonce['est_accessible_PMR'] ? 'Oui' : 'Non';
            $annonce['a_parking'] = $annonce['a_parking'] ? 'Oui' : 'Non';
            $annonce['a_WIFI'] = $annonce['a_WIFI'] ? 'Oui' : 'Non';
            $annonce = $this->get_logements_adresse([$annonce])[0];
            $data = ["erreur" => false, 
                 "annonces" => $annonce,
                 "id_annonces" => $_GET["id"]];

            $this->render("annonces", $data);
        } else {
            echo "Annonce introuvable.";
        }
    
    }

}
?>

