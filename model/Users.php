<?php

class Users extends DB
{
    protected $table = 'users';

    public function __construct()
    {
        try {
            parent::__construct();
            $this->query("CREATE TABLE IF NOT EXISTS {$this->table} (id INTEGER NOT NULL AUTO_INCREMENT, username VARCHAR(100) NOT NULL, psswd VARCHAR(100) NOT NULL, is_admin BOOLEAN DEFAULT false, CONSTRAINT pk_{$this->table} PRIMARY KEY(id), CONSTRAINT uc_{$this->table} UNIQUE (username))");
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }

    protected function addUser($data)
    {
        try {
            $user = $this->prepare("INSERT INTO {$this->table} (username, psswd, is_admin) VALUES (?, ?, ?)");
            $data['psswd'] = md5($data['psswd']);
            if($user->execute([$data['username'], $data['psswd'], $data['is_admin']])) {
                return 1;
            }
        } catch(Exception $e) {
            die("Erreur d'ajout d'utilisateur " . $e->getMessage());
        }
    }

    protected function getUserByUsername($username)
    {
        try {
            $user = $this->prepare("SELECT * FROM {$this->table} WHERE username = ?");
            $user->execute([$username]);
            return $user->get_result();
        } catch(Exception $e) {
            die("Erreur de récupération d'un utilisateur : " . $e->getMessage());
        }
    }

    public function getAllUsersWithoutAdmin()
    {
        try {
            $user = $this->query("SELECT * FROM {$this->table} WHERE is_admin = false");
            return $user->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de récupération d'un utilisateur : " . $e->getMessage());
        }
    }

    public function login($data)
    {
        try {
            $user = $this->getUserByUsername($data['username']);
            if($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                if(md5($data['psswd']) == $user['psswd']) {
                    $_SESSION['user'] = $data['username'];
                    return 1;
                } else {
                    return 0;
                }
            }
            return $user->get_result();
        } catch(Exception $e) {
            die("Erreur de récupération d'un utilisateur : " . $e->getMessage());
        }
    }
}