<?php
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
         // Charger le modèle
         $model = Model::getModel();

         // Récupérer les données du formulaire
         $type = $_POST['type'];
         $surface = $_POST['surface'];
         $proprietaire = $_POST['proprietaire'];
         $loyer = $_POST['loyer'];
         $charges = $_POST['charges'];
         $adresse = $_POST['adresse'];
         $est_meuble = isset($_POST['est_meuble']) ? 1 : 0;
         $a_WIFI = isset($_POST['a_WIFI']) ? 1 : 0;
         $est_accessible_PMR = isset($_POST['est_accessible_PMR']) ? 1 : 0;
         $nb_pieces = $_POST['nb_pieces'];
         $a_parking = isset($_POST['a_parking']) ? 1 : 0;
         $description = $_POST['description'];
         $creer_a = date("Y-m-d");

         // Insérer le logement dans la base de données
         $logement_id = $model->insertLogement($type, $surface, $proprietaire, $loyer, $charges, $creer_a, $adresse, $est_meuble, $a_WIFI, $est_accessible_PMR, $nb_pieces, $a_parking, $description);

         if ($logement_id) {
             // Définir le chemin du dossier où l'image doit être placée
             $directory = "Content/Images/Proprio_" . $proprietaire . "/Logement_" . $logement_id;

             // Vérifier si le dossier existe déjà, sinon le créer
             if (!is_dir($directory)) {
                 mkdir($directory, 0777, true); // Créer le dossier avec les permissions appropriées
             }

             // Gestion des fichiers uploadés
             foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                 $file_name = basename($_FILES['images']['name'][$key]);
                 $file_path = $directory . "/" . $file_name;

                 // Déplacer l'image dans le dossier
                 if (move_uploaded_file($tmp_name, $file_path)) {
                     echo "Image $file_name ajoutée avec succès dans le dossier $directory.<br>";
                 } else {
                     echo "Erreur lors de l'upload de l'image : $file_name. Le chemin attendu était : $file_path<br>";
                 }
             }

             echo "Logement ajouté avec succès.";
         } else {
             echo "Erreur lors de l'ajout du logement.";
         }
     }

    }}

?>
