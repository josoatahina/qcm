<?php

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'testqcm';
    private $mysqli;

    public function __construct()
    {
        try {
            $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
            if($this->mysqli->connect_errno) {
                die("Erreur de connexion à la base de donnée : " . $this->connect_error);
            }
        } catch(Exception $e) {
            die("Erreur de base de donnée : " . $e->getMessage());
        }
    }

    protected function query($query)
    {
        return $this->mysqli->query($query);
    }

    protected function prepare($query)
    {
        return $this->mysqli->prepare($query);
    }

    protected function close()
    {
        return $this->mysqli->close();
    }
}