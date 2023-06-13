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
}