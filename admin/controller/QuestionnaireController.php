<?php

class QuestionnaireController extends Questionnaire
{
    public function index()
    {
        $qcm = $this->getAllQcm();
        if(count($qcm) > 0) {
            echo "<div class='row'>";
            foreach($qcm as $q) {
                $nb_qcm = $this->getNbQuestion($q['id']);
                include('views/template/qcm.php');
            }
            echo "</div>";
        } else {
            echo '<div class="col-12 mt-4"><b>Aucune QCM pour le moment.</b></div>';
        }
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
        if(count($qcm) > 0) {
            $questionnaire = $this->getAllQuestionnaire($qcm['id']);
            include_once('views/layout/view_qcm.php');
        } else {
            header('Location: /qcm/admin?c=Questionnaire');
        }
    }

    public function deleteQuestion($data)
    {
        echo parent::deleteQuestion($data['id']);
    }
}