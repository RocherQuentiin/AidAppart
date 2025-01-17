<?php

class Controller_admin extends Controller {
    public function action_default() {
        $this->action_admin();
    }

    public function action_admin() {
        $name = $_POST['name'] ?? NULL;
        if ($name == NULL) {
            $users = $this->get_users_with_roles();
        } else {
            $users = $this->get_user_by_name_or_last_name($name);
        }
        $allLogements = $this->allLogement();
        $reportedLogements = $this->get_reported_logements();
        $data = ["erreur" => false, 
                 "users" => $users,
                 "reportedLogements" => $reportedLogements,
                 "allLogements" => $allLogements];
        $this->render("admin", $data);
    }

    public function allLogement() {
        $model = Model::getModel();
        $allLogements = $model->selectAllFromTable("logement");
        return $allLogements;
    }

    public function get_users_with_roles() {
        $model = Model::getModel();
        $users = $model->selectAllFromTable('personne');
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
        $model->assignRole($data['id'], $data['role']);
    }

    public function action_delete_user() {
        $model = Model::getModel();
        $data = json_decode(file_get_contents('php://input'), true);
        $model->disableUser($data['id'], "inactif");
    }

    public function get_reported_logements() {
        $model = Model::getModel();
        $reportedLogements = $model->getReportedLogements();
        foreach ($reportedLogements as &$logement) {
            $reporter = $model->getdataById('Personne', $logement['id_personne']);
            $logement['reporter_name'] = $reporter['nom'] . ' ' . $reporter['prénom'];
        }
        return $reportedLogements;
    }

    public function get_user_by_name_or_last_name($name) {
        $model = Model::getModel();
        $users = $model->getUserByNameOrLastName($name);
        $usersWithRoles = [];

        foreach ($users as $user) {
            $roles = $model->getUserRoles($user['id']);
            $user['roles'] = array_column($roles, 'nom');
            $usersWithRoles[] = $user;
        }
        return $usersWithRoles;
    }

    public function action_search_user() {
        $users = $this->get_user_by_name_or_last_name($name);
        $reportedLogements = $this->get_reported_logements();
        $data = ["erreur" => false, 
                 "users" => $users,
                 "reportedLogements" => $reportedLogements];
        $this->render("admin", $data);
    }

    public function action_delete_logement() {
        $model = Model::getModel();
        $data = json_decode(file_get_contents('php://input'), true);
        $model->deleteById("logement", $data['id']);
    }
}

?>