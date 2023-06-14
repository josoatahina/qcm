<?php

class Users extends DB
{
    protected $table = 'users';

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

    public function getUserByUsername($username)
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
}