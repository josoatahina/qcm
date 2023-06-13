<?php

class QcmController extends Qcm
{
    public function index()
    {
        /** */
    }

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

    public function view()
    {
        $qcm = $this->getQcmById($_REQUEST['id']);
        if($qcm->num_rows > 0) {
            $qcm = $qcm->fetch_assoc();
            include_once('views/layout/view_qcm.php');
        } else {
            header('Location: /qcm/admin?c=Qcm');
        }
    }

    public function update($data)
    {
        echo $this->updateQcm($data);
    }
}