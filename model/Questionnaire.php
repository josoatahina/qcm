<?php

class Questionnaire extends QCM
{
    protected function getAllQuestionnaire($id_qcm)
    {
        try {
            return $this->sql_fetch_one(TABLE_QUESTIONNAIRE, 'id_qcm', $id_qcm)->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de récupération des Questionnaires : " . $e->getMessage());
        }
    }

    protected function addQuestionnaire($data)
    {
        try {
            $questionnaire = $this->prepare("INSERT INTO ".TABLE_QUESTIONNAIRE." (texte,options,reponse,id_qcm) VALUES (?,?,?,?)");
            $data['options'] = json_encode($data['options']);
            if($questionnaire->execute([$data['texte'], $data['options'], $data['reponse'], $data['id_qcm']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de questionnaire " . $e->getMessage());
        }
    }

    protected function updateQuestionnaire($data)
    {
        try {
            $questionnaire = $this->prepare("UPDATE ".TABLE_QUESTIONNAIRE." SET texte = ?, options = ?, reponse = ?, id_qcm = ? WHERE id = ?");
            $data['options'] = json_encode($data['options']);
            if($questionnaire->execute([$data['texte'], $data['options'], $data['reponse'], $data['id_qcm'], $data['id']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de mise à jour de questionnaire " . $e->getMessage());
        }
    }

    protected function deleteQuestion($id)
    {
        try {
            $questionnaire = $this->prepare("DELETE FROM ".TABLE_QUESTIONNAIRE." WHERE id = ?");
            if($questionnaire->execute([$id])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de suppression QCM " . $e->getMessage());
        }
    }

    protected function getNbQuestion($id_qcm)
    {
        try {
            return $this->sql_fetch_one(TABLE_QUESTIONNAIRE, 'id_qcm', $id_qcm)->num_rows;
        } catch(Exception $e) {
            die("Erreur sur le nombre de question " . $e->getMessage());
        }
    }

    protected function getQuestionnaireById($id)
    {
        try {
            return $this->sql_fetch_one(TABLE_QUESTIONNAIRE, 'id', $id)->fetch_assoc();
        } catch(Exception $e) {
            die("Erreur sur la récupération d'une questionnaire " . $e->getMessage());
        }
    }

    protected function getReponse($id)
    {
        try {
            return $this->sql_fetch_one(TABLE_QUESTIONNAIRE, 'id', $id)->fetch_assoc()['reponse'];
        } catch(Exception $e) {
            die("Erreur sur la bonne réponse " . $e->getMessage());
        }
    }
}