<?php

class CollectData extends DB
{
    private $table = 'collect_data';

    public function __construct()
    {
        try {
            parent::__construct();
            $this->query("CREATE TABLE IF NOT EXISTS {$this->table} (id INTEGER NOT NULL AUTO_INCREMENT, id_qcm INTEGER NOT NULL, id_q INTEGER NOT NULL, reponse INTEGER NOT NULL, choisi INTEGER NOT NULL, CONSTRAINT pk_{$this->table} PRIMARY KEY (id), CONSTRAINT fk_qcm FOREIGN KEY (id_qcm) REFERENCES qcm (id), CONSTRAINT fk_questionnaire FOREIGN KEY (id_q) REFERENCES questionnaire (id))");
        } catch(Exception $e) {
            die("Erreur de la classe CollectData : " . $e->getMessage());
        }
    }

    public function addData($data)
    {
        try {
            $cData = $this->prepare("INSERT INTO {$this->table} (id_qcm,id_q,reponse,choisi) VALUES (?,?,?,?)");
            if($cData->execute([$data['id_qcm'], $data['id_q'], $data['reponse'], $data['choisi']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de donnée " . $e->getMessage());
        }
    }
}