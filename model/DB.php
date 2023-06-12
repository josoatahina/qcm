<?php

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'qcm';
    private $mysqli;

    public function __construct()
    {
        try {
            $this->mysqli = new mysqli($this->host, $this->user, $this->pass);
            if($this->mysqli->connect_errno) {
                die("Erreur de connexion à la base de donnée : " . $this->connect_error);
            }
            $this->mysqli->query("CREATE DATABASE IF NOT EXISTS {$this->dbname} CHARACTER SET utf8 COLLATE utf8_general_ci");
            $this->mysqli->select_db($this->dbname);
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

    protected function getAllRows($table, $orderBy = 'id', $orderValue = 'DESC')
    {
        $query = $this->query("SELECT * FROM {$table} ORDER BY {$orderBy} {$orderValue}");
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}