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
            $qcm = $this->prepare("DELETE q, qe, c FROM ".TABLE_QCM." q LEFT JOIN ".TABLE_QUESTIONNAIRE." qe ON q.id = qe.id_qcm LEFT JOIN ".TABLE_COLLECT_DATA." c ON q.id = c.id_qcm WHERE q.id = ?");
            if($qcm->execute([$id])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de suppression QCM " . $e->getMessage());
        }
    }
}