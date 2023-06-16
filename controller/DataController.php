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
        $cdata = $this->getDataQCM();
        if(count($cdata) > 0) {
            foreach($cdata as $data) {
                include('views/data.php');
            }
        } else {
            echo '<div class="col-12 mt-4"><b>Vous n\'avez pas encore répondu à aucune QCM.</b><div>';
        }
    }
}