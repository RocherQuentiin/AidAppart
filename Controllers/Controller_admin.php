<?php

class Controller_admin extends Controller {
    public function action_default() {
        $this->action_admin();
    }

    public function action_admin() {
        $users = $this->get_users_with_roles();
        $reportedLogements = $this->get_reported_logements();
        $data = ["erreur" => false, 
                 "users" => $users,
                 "reportedLogements" => $reportedLogements];
        $this->render("admin", $data);
    }

    public function get_users_with_roles() {
        $model = Model::getModel();
        $users = $model->selectAllFromTable('Personne');
        $usersWithRoles = [];

        foreach ($users as $user) {
            $roles = $model->getUserRoles($user['id']);
            $user['roles'] = array_column($roles, 'nom');
            $usersWithRoles[] = $user;
        }
        return $usersWithRoles;
    }

    public function action_assign_role() {
        $model = Model::getModel();
        $data = json_decode(file_get_contents('php://input'), true);
        print_r($data);
        $model->assignRole($data['id'], $data['role']);
    }

    public function action_delete_user() {
        $model = Model::getModel();
        $data = json_decode(file_get_contents('php://input'), true);
        $model->deleteById("personne", $data['id']);
    }

    public function get_reported_logements() {
        $model = Model::getModel();
        $reportedLogements = $model->getReportedLogements();
        foreach ($reportedLogements as &$logement) {
            $reporter = $model->getdataById('personne', $logement['id_personne']);
            $logement['reporter_name'] = $reporter['nom'] . ' ' . $reporter['prénom'];
        }
        return $reportedLogements;
    }
}

?>