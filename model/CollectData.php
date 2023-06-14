<?php

class CollectData extends Questionnaire
{
    private $table = 'collect_data';

    protected function addData($data)
    {
        try {
            $cData = $this->prepare("INSERT INTO {$this->table} (id_qcm,id_user,reponse) VALUES (?,?,?)");
            if($cData->execute([$data['id_qcm'], $data['id_user'], $data['reponse']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de donnée " . $e->getMessage());
        }
    }
}