<?php

class DataController extends CollectData
{
    public function index()
    {
        $cdata = $this->getDataQCM(false);
        foreach($cdata as $data) {
            $user = new Users();
            $user = $user->getUserById($data['id_user'])->fetch_assoc();
            include('views/data.php');
        }
    }
}