<?php

class CollectData extends Questionnaire
{

    protected function addData($data)
    {
        try {
            $cData = $this->prepare("INSERT INTO ".TABLE_COLLECT_DATA." (id_qcm,id_user,reponse_choisi,nb_bonne_reponse,nb_reponse) VALUES (?,?,?,?,?)");
            if($cData->execute([$data['id_qcm'], $data['id_user'], $data['reponse_choisi'], $data['nb_bonne_reponse'], $data['nb_reponse']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout de donnée " . $e->getMessage());
        }
    }

    protected function getData()
    {
        try {
            return $this->getDataQCM();
        } catch(Exception $e) {
            die("Erreur d'ajout de donnée " . $e->getMessage());
        }
    }
}