<?php

class CollectData extends Questionnaire
{
    private $table = 'collect_data';

    protected function addData($data)
    {
        try {
            $cData = $this->prepare("INSERT INTO {$this->table} (id_qcm,id_q,id_user,reponse,choisi) VALUES (?,?,?,?,?)");
            if($cData->execute([$data['id_qcm'], $data['id_q'], $data['id_user'], $data['reponse'], $data['choisi']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de donnée " . $e->getMessage());
        }
    }
}