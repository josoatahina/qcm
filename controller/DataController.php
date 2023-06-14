<?php

class DataController extends CollectData
{
    public function answer($data)
    {
        $user = new Users();
        $current_user = $user->getUserByUsername($_SESSION['user'])->fetch_assoc();
        $data['id_user'] = $current_user['id'];
        $data['reponse'] = json_encode($data['reponse']);
        echo $this->addData($data);
    }

    public function index()
    {
        echo "data";
    }
}