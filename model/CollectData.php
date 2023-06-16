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

    public function getNbParticipant()
    {
        try {
            $query = $this->sql_fetch_all(TABLE_COLLECT_DATA);
            $nb_participant = [];
            foreach($query as $row) {
                $nb_participant[$row['id_user']] = $row['id_user'];
            }
            return count($nb_participant);
        } catch(Exception $e) {
            die("Erreur de participant " . $e->getMessage());
        }
    }

    public function getNbSuccess()
    {
        try {
            $query = $this->sql_fetch_all(TABLE_COLLECT_DATA);
            $nb_reponse = 0;
            $nb_reussite = 0;
            foreach($query as $row) {
                $nb_reponse = $nb_reponse + $row['nb_reponse'];
                $nb_reussite = $nb_reussite + $row['nb_bonne_reponse'];
            }
            if($nb_reponse == 0) {
                $taux_reussite = 0;
            } else {
                $taux_reussite = round($nb_reussite / $nb_reponse, 2);
            }
            return ($taux_reussite * 100);
        } catch(Exception $e) {
            die("Erreur de récupération du taux de succès " . $e->getMessage());
        }
    }
}