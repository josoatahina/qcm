<?php

class QcmController extends Qcm
{
    public function add()
    {
        require_once('views/layout/add_qcm.php');
    }

    public function addQcm($data)
    {
        $rep = parent::addQcm($data);
        if($rep) {
            echo json_encode($rep);
        }
    }

    public function update($data)
    {
        echo $this->updateQcm($data);
    }

    public function deleteQcm($data)
    {
        echo parent::deleteQcm($data['id']);
    }
}