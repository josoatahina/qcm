<?php

class Questionnaire extends QCM
{
    protected $table = 'questionnaire';

    public function __construct()
    {
        try {
            parent::__construct();
            $this->query("CREATE TABLE IF NOT EXISTS {$this->table} (id INTEGER NOT NULL AUTO_INCREMENT, texte VARCHAR(255) NOT NULL, options JSON NOT NULL, reponse INTEGER NOT NULL, id_qcm INTEGER NOT NULL, CONSTRAINT pk_{$this->table} PRIMARY KEY(id), CONSTRAINT fk_{$this->getTable()} FOREIGN KEY (id_qcm) REFERENCES {$this->getTable()} (id))");
        } catch(Exception $e) {
            die("Erreur de la classe Questionnaire : " . $e->getMessage());
        }
    }

    protected function getAllQuestionnaire($id_qcm)
    {
        try {
            $query = $this->prepare("SELECT * FROM {$this->table} WHERE id_qcm = ?");
            $query->execute([$id_qcm]);
            return $query->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de récupération des Questionnaires : " . $e->getMessage());
        }
    }

    protected function addQuestionnaire($data)
    {
        try {
            $questionnaire = $this->prepare("INSERT INTO {$this->table} (texte,options,reponse,id_qcm) VALUES (?,?,?,?)");
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
            $questionnaire = $this->prepare("UPDATE {$this->table} SET texte = ?, options = ?, reponse = ?, id_qcm = ? WHERE id = ?");
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
            $questionnaire = $this->prepare("DELETE FROM {$this->table} WHERE id = ?");
            if($questionnaire->execute([$id])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de suppression QCM " . $e->getMessage());
        }
    }

    protected function deleteQcm($id)
    {
        try {
            $qcm = $this->prepare("DELETE FROM {$this->getTable()} WHERE id = ?");
            $questionnaire = $this->prepare("DELETE FROM {$this->table} WHERE id_qcm = ?");
            if($qcm->execute([$id]) && $questionnaire->execute([$id])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de suppression QCM " . $e->getMessage());
        }
    }

    protected function getNbQuestion($id_qcm)
    {
        try {
            $nb_questionnaire = $this->prepare("SELECT * FROM {$this->table} WHERE id_qcm = ?");
            $nb_questionnaire->execute([$id_qcm]);
            return $nb_questionnaire->get_result()->num_rows;
        } catch(Exception $e) {
            die("Erreur sur le nombre de question " . $e->getMessage());
        }
    }
}