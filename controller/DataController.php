<?php

class DataController extends CollectData
{
    public function answer($data)
    {
        $rep = 0;
        foreach($data['reponse'] as $id => $value) {
            $user = new Users();
            $current_user = $user->getUserByUsername($_SESSION['user'])->fetch_assoc();
            $question = $this->getQuestionnaireById($id);
            $data_to_insert['id_qcm'] = $question['id_qcm'];
            $data_to_insert['id_q'] = $id;
            $data_to_insert['id_user'] = $current_user['id'];
            $data_to_insert['reponse'] = $question['reponse'];
            $data_to_insert['choisi'] = $value;
            $rep = $rep + $this->addData($data_to_insert);
        }
        if($rep == count($data['reponse'])) {
            echo $rep;
        } else {
            echo 0;
        }
    }
}