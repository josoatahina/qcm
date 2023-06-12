<?php

class Questionnaire extends QCM
{
    protected $table = 'questionnaire';

    protected function __construct()
    {
        try {
            parent::__construct();
            $this->query("CREATE TABLE IF NOT EXISTS {$this->table} (id INTEGER NOT NULL AUTO_INCREMENT, texte VARCHAR(255) NOT NULL, options JSON NOT NULL, reponse INTEGER NOT NULL, id_qcm INTEGER NOT NULL, CONSTRAINT pk_{$this->table} PRIMARY KEY(id), CONSTRAINT fk_{parent::$table} FOREIGN KEY (id_qcm) REFERENCES {parent::$table} (id))");
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }

    protected function getAllQuestionnaire($id_qcm)
    {
        try {
            $query = $this->prepare("SELECT * FROM {$table} WHERE id_qcm = ?");
            $query->bind_param('d', $id_qcm);
            $query->execute();
            return $this->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }

    protected function addQuestionnaire($data)
    {
        try {
            $user = $this->prepare("INSERT INTO {$this->table} (texte,options,reponse,id_qcm) VALUES (?,?,?,?)");
            $user->bind_param('sssd', $data['texte'], $data['options'], $data['reponse'], $data['id_qcm']);
            if($user->execute()) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout d'utilisateur " . $e->getMessage());
        }
    }

    protected function updateQuestionnaire($data)
    {
        try {
            $user = $this->prepare("UPDATE SET texte = ?, options = ?, reponse = ?, id_qcm = ? WHERE id = ?");
            $user->bind_param('ssssdd', $data['titre'], $data['descriptions'], $data['sujet'], $data['niveau'], $data['nb_question'], $data['id']);
            if($user->execute()) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout d'utilisateur " . $e->getMessage());
        }
    }
}