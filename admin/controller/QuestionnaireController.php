<?php

class QuestionnaireController extends Questionnaire
{
    public function deleteQcm($data)
    {
        echo parent::deleteQcm($data['id']);
    }
}