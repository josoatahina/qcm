<?php

class QuestionnaireController extends Questionnaire
{
    public function index()
    {
        $qcm = $this->getAllQcm();
        if(count($qcm) > 0) {
            foreach($qcm as $q) {
                $nb_qcm = $this->getNbQuestion($q['id']);
                include('views/template/qcm.php');
            }
        } else {
            echo '<div class="col-12 mt-4"><b>Aucune QCM pour le moment.</b></div>';
        }
    }

    public function deleteQcm($data)
    {
        echo parent::deleteQcm($data['id']);
    }

    public function addMoreQuestion($data)
    {
        require_once('views/template/question.php');
    }

    public function addMoreOptions($data)
    {
        require_once('views/template/options.php');
    }

    public function addQuestion($data)
    {
        if(isset($data['id'])) {
            echo $this->updateQuestionnaire($data);
        } else {
            echo $this->addQuestionnaire($data);
        }
    }

    public function view()
    {
        $qcm = $this->getQcmById($_REQUEST['id']);
        if($qcm->num_rows > 0) {
            $qcm = $qcm->fetch_assoc();
            $questionnaire = $this->getAllQuestionnaire($_REQUEST['id']);
            include_once('views/layout/view_qcm.php');
        } else {
            header('Location: /qcm/admin?c=Qcm');
        }
    }

    public function deleteQuestion($data)
    {
        echo parent::deleteQuestion($data['id']);
    }
}