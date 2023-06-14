<?php

class QuestionnaireController extends Questionnaire
{
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
        $data['options'] = json_encode($data['options']);
        echo $this->addQuestionnaire($data);
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
}