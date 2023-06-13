<?php

class QCM extends DB
{
    protected $table = 'qcm';

    protected function __construct()
    {
        try {
            parent::__construct();
            $this->query("CREATE TABLE IF NOT EXISTS {$this->table} (id INTEGER NOT NULL AUTO_INCREMENT, titre VARCHAR(255) NOT NULL, descriptions LONGTEXT, sujet VARCHAR(255), niveau VARCHAR(255) NOT NULL, nb_question INTEGER NOT NULL, CONSTRAINT pk_{$this->table} PRIMARY KEY(id))");
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }

    protected function getAllQcm()
    {
        try {
            return $this->getAllRows($this->table);
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }

    protected function addQcm($data)
    {
        try {
            $user = $this->prepare("INSERT INTO {$this->table} (titre,descriptions,sujet,niveau,nb_question) VALUES (?,?,?,?,?)");
            $user->bind_param('ssssd', $data['titre'], $data['descriptions'], $data['sujet'], $data['niveau'], $data['nb_question']);
            if($user->execute()) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de qcm " . $e->getMessage());
        }
    }

    protected function updateQcm($data)
    {
        try {
            $user = $this->prepare("UPDATE SET titre = ?, descriptions = ?, sujet = ?, niveau = ?, nb_question = ? WHERE id = ?");
            $user->bind_param('ssssdd', $data['titre'], $data['descriptions'], $data['sujet'], $data['niveau'], $data['nb_question'], $data['id']);
            if($user->execute()) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur de mise à jour de qcm " . $e->getMessage());
        }
    }
}