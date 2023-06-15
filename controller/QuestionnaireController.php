<?php

class QuestionnaireController extends Questionnaire
{
    public function index()
    {
        $qcm = $this->getAllQcm();
        if(count($qcm) > 0) {
            foreach($qcm as $q) {
                $nb_qcm = $this->getNbQuestion($q['id']);
                include('views/questionnaire.php');
            }
        } else {
            echo '<div class="col-12 mt-4"><b>Aucune QCM pour le moment.</b></div>';
        }
    }

    public function answer()
    {
        $qcm = $this->getQcmById($_REQUEST['id']);
        if(count($qcm) > 0) {
            $questionnaire = $this->getAllQuestionnaire($qcm['id']);
            include_once('views/layout/answer.php');
        } else {
            return '<div class="col-12"><b>Aucune QCM pour le moment.</b></div>';
        }
    }
}