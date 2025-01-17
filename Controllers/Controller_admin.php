<?php

class Controller_admin extends Controller {
    public function action_default() {
        $this->action_admin();
    }

    public function action_admin() {
        $users = $this->get_users_with_roles();
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

    public function action_get_user() {
        header('Content-Type: application/json');
        $model = Model::getModel();
        $user = $this->get_users_with_roles();
        $user = array_map(function($u) {
            return [
            'id' => $u['id'],
            'nom' => $u['nom'],
            'prenom' => $u['prénom'],
            'email' => $u['email'],
            'creer_a' => $u['creer_a'],
            'roles' => $u['roles']
            ];
        }, $user);
        echo json_encode($user);
        exit;
    }

}

?>