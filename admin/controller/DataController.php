<?php

class DataController extends CollectData
{
    public function index()
    {
        $cdata = $this->getDataQCM(false);
        if(count($cdata) > 0) {
            foreach($cdata as $data) {
                $user = new Users();
                $user = $user->getUserById($data['id_user'])->fetch_assoc();
                include('views/data.php');
            }
        } else {
            echo '<div class="col-12 mt-4"><b>Aucune réponse pour le moment.</b></div>';
        }
    }
}