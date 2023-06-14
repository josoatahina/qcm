<?php

class QCM extends DB
{
    private $table = 'qcm';

    public function getTable()
    {
        return $this->table;
    }

    public function getAllQcm()
    {
        try {
            $query = $this->query("SELECT * FROM {$this->table}");
            return $query->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de récupération des QCM : " . $e->getMessage());
        }
    }

    protected function getQcmById($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM {$this->table} WHERE id = ?");
            $query->execute([$id]);
            return $query->get_result();
        } catch(Exception $e) {
            die("Erreur de récupération d'un QCM : " . $e->getMessage());
        }
    }

    protected function addQcm($data)
    {
        try {
            $qcm = $this->prepare("INSERT INTO {$this->table} (titre,descriptions,sujet,niveau) VALUES (?,?,?,?)");
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
            $qcm = $this->prepare("UPDATE {$this->table} SET titre = ?, descriptions = ?, sujet = ?, niveau = ? WHERE id = ?");
            if($qcm->execute([$data['titre'], $data['descriptions'], $data['sujet'], $data['niveau'], $data['id']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de mise à jour de qcm " . $e->getMessage());
        }
    }
}