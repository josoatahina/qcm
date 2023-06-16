<?php

class DB
{
    private $mysqli;

    public function __construct()
    {
        try {
            $this->mysqli = new mysqli(HOST, USER, PASS, DATABASE);
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

    protected function sql_fetch_all($table)
    {
        $query = $this->query("SELECT * FROM {$table}");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    protected function sql_fetch_one($table, $whereColumn, $whereValue)
    {
        $query = $this->prepare("SELECT * FROM {$table} WHERE {$whereColumn} = ?");
        $query->execute([$whereValue]);
        return $query->get_result();
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