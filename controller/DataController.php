<?php

class DataController extends CollectData
{
    public function answer($data)
    {
        $user = new Users();
        $current_user = $user->getUserByUsername($_SESSION['user'])->fetch_assoc();
        $data['id_user'] = $current_user['id'];
        $data['nb_reponse'] = count($data['reponse_choisi']);
        $nb_bonne_reponse = 0;
        foreach($data['reponse_choisi'] as $id => $value) {
            if($this->getReponse($id) == $value) {
                $nb_bonne_reponse += 1;
            }
        }
        $data['reponse_choisi'] = json_encode($data['reponse_choisi']);
        $data['nb_bonne_reponse'] = $nb_bonne_reponse;
        echo $this->addData($data);
    }

    public function index()
    {
        $cdata = $this->getData();
        foreach($cdata as $data) {
            include('views/data.php');
        }
    }
}