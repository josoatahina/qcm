<?php

class QCM extends DB
{
    public function getAllQcm()
    {
        try {
            return $this->sql_fetch_all(TABLE_QCM);
        } catch(Exception $e) {
            die("Erreur de récupération des QCM : " . $e->getMessage());
        }
    }

    protected function getQcmById($id)
    {
        try {
            return $this->sql_fetch_one(TABLE_QCM, 'id', $id)->fetch_assoc();
        } catch(Exception $e) {
            die("Erreur de récupération d'un QCM : " . $e->getMessage());
        }
    }

    protected function addQcm($data)
    {
        try {
            $qcm = $this->prepare("INSERT INTO ".TABLE_QCM." (titre,descriptions,sujet,niveau) VALUES (?,?,?,?)");
            $data['descriptions'] = str_replace("\n", "<br>", $data['descriptions']);
            if($qcm->execute([$data['titre'], $data['descriptions'], $data['sujet'], $data['niveau']])) {
                return ['success' => 1, 'id' => $qcm->insert_id];
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de qcm " . $e->getMessage());
        }
    }

    protected function updateQcm($data)
    {
        try {
            $qcm = $this->prepare("UPDATE ".TABLE_QCM." SET titre = ?, descriptions = ?, sujet = ?, niveau = ? WHERE id = ?");
            $data['descriptions'] = str_replace("\n", "<br>", $data['descriptions']);
            if($qcm->execute([$data['titre'], $data['descriptions'], $data['sujet'], $data['niveau'], $data['id']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de mise à jour de qcm " . $e->getMessage());
        }
    }

    protected function deleteQcm($id)
    {
        try {
            $qcm = $this->prepare("DELETE ".TABLE_QCM.", ".TABLE_QUESTIONNAIRE.", ".TABLE_COLLECT_DATA." FROM ".TABLE_QCM." JOIN ".TABLE_QUESTIONNAIRE." ON ".TABLE_QCM.".id = ".TABLE_QUESTIONNAIRE.".id_qcm JOIN ".TABLE_QCM.".id = ".TABLE_COLLECT_DATA.".id_qcm WHERE ".TABLE_QCM.".id = ?");
            if($qcm->execute([$id])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de suppression QCM " . $e->getMessage());
        }
    }

    protected function getDataQCM()
    {
        try {
            $user = new Users();
            $current_user = $user->getUserByUsername($_SESSION['user'])->fetch_assoc();
            $data = $this->prepare("SELECT q.*, qe.id AS question_id, qe.texte, qe.options, qe.reponse, c.id AS data_id, c.reponse_choisi, c.nb_reponse FROM ".TABLE_QCM." q JOIN ".TABLE_QUESTIONNAIRE." qe ON qe.id_qcm = q.id JOIN ".TABLE_COLLECT_DATA." c ON c.id_qcm = q.id WHERE c.id_user = ? ORDER BY data_id ASC");
            $data->execute([$current_user['id']]);
            $data = $data->get_result();
            $qcmData = [];
            $q = [];
            while($row = $data->fetch_assoc()) {
                $q[$row['question_id']] = [
                    'texte' => $row['texte'],
                    'options' => json_decode($row['options'], true)
                ];
                $qcmData[$row['data_id']] = [
                    'id' => $row['id'],
                    'titre' => $row['titre'],
                    'descriptions' => $row['descriptions'],
                    'sujet' => $row['sujet'],
                    'niveau' => $row['niveau'],
                    'data_id' => $row['data_id'],
                    'data' => json_decode($row['reponse_choisi'], true),
                    'questionnaire' => $q
                ];
            }
            return $qcmData;
        } catch(Exception $e) {
            die("Erreur sur la requête de questionnaire et qcm " . $e->getMessage());
        }
    }
}