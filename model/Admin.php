<?php

class Admin extends Users
{
    private $username = 'Tahina54';
    private $psswd = 'admin123';

    public function addAdmin()
    {
        try {
            $admin = $this->getUserByUsername($this->username);
            if($admin->num_rows == 0) {
                $infoAdmin = ['username' => $this->username, 'psswd' => $this->psswd, 'is_admin' => true];
                $this->addUser($infoAdmin);
            }
        } catch(Exception $e) {
            die("Erreur de la classe User : " . $e->getMessage());
        }
    }
}