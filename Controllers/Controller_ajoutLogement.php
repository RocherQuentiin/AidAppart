<?php
session_start();
class Controller_ajoutLogement extends Controller {

    public function action_default() {
        $this->action_ajoutLogement();
    }

   public function action_ajoutLogement() {
        $data = ["erreur" => false];
        $this->render("ajoutLogement", $data);
   }

   public function action_addLogement(){
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $model = Model::getModel();

       $numero = $_POST['numero'];
        $rue = $_POST['rue'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $id_adresse = $model->insertAdresse($numero, $rue, $code_postal, $ville);

         $type = $_POST['type'];
         $surface = $_POST['surface'];
         $proprietaire = $_SESSION['idpersonne'];
         $loyer = $_POST['loyer'];
         $charges = $_POST['charges'];
         $est_meuble = isset($_POST['est_meuble']) ? 1 : 0;
         $a_WIFI = isset($_POST['a_WIFI']) ? 1 : 0;
         $est_accessible_PMR = isset($_POST['est_accessible_PMR']) ? 1 : 0;
         $nb_pieces = $_POST['nb_pieces'];
         $a_parking = isset($_POST['a_parking']) ? 1 : 0;
         $description = $_POST['description'];

        if (!$id_adresse) {
            echo "Erreur lors de l'insertion de l'adresse.";
            return;
        }
         // Insérer le logement dans la base de données
         $logement_id = $model->insertLogement($type, $surface, $proprietaire, $loyer, $charges, $id_adresse, $est_meuble, $a_WIFI, $est_accessible_PMR, $nb_pieces, $a_parking, $description);
        if ($logement_id) {
            // Définir le chemin du dossier où l'image doit être placée
            $directory = "Content/Images/Proprio_" . $proprietaire . "/Logement_" . $logement_id;
            // Vérifier si le dossier existe déjà, sinon le créer
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true); // Créer le dossier avec les permissions appropriées
            }

            // Gestion des fichiers uploadés
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = "image_vitrine.png";
                $file_path = $directory . "/" . $file_name;

                // Déplacer l'image dans le dossier
                if (!move_uploaded_file($tmp_name, $file_path)) {
                    echo "Erreur lors de l'upload de l'image : $file_name. Le chemin attendu était : $file_path<br>";
                }
            }

            header('Location: ?controller=pagelogement&action=pagelogement');;
        } else {
            echo "Erreur lors de l'ajout du logement.";
        }
     }

    }}

?>
