<?php

class IndexController
{
    public function index()
    {
        if(isset($_SESSION['admin'])) {
            $qcm = new QCM();
            $nb_qcm = count($qcm->getAllQcm());
            $users = new Users();
            $nb_users = count($users->getAllUsersWithoutAdmin());
            $data = new CollectData();
            $participant = $data->getNbParticipant();
            require_once('views/dashboard.php');
        } else {
            require_once('views/layout/admin_login.php');
        }
    }
}