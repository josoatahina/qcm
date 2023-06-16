<?php

class Users extends DB
{
    protected function addUser($data)
    {
        try {
            $user = $this->prepare("INSERT INTO ".TABLE_USERS." (username, psswd, is_admin) VALUES (?, ?, ?)");
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
            return $this->sql_fetch_one(TABLE_USERS, 'username', $username);
        } catch(Exception $e) {
            die("Erreur de récupération d'un utilisateur : " . $e->getMessage());
        }
    }

    public function getAllUsersWithoutAdmin()
    {
        try {
            return $this->sql_fetch_one(TABLE_USERS, 'is_admin', false)->fetch_all(MYSQLI_ASSOC);
        } catch(Exception $e) {
            die("Erreur de récupération de tous les utilisateurs : " . $e->getMessage());
        }
    }
}