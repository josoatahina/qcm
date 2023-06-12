<?php

class UserController extends Users
{
    public function addUser($data)
    {
        $data['is_admin'] = false;
        return parent::addUser($data);
    }

    public function login($data)
    {
        $user = $this->getUserByUsername($data['username']);
        if($user->num_rows > 0) {
            $user = $user->fetch_assoc();
            if($user['psswd'] == $data['psswd']) {
                $_SESSION['user'] = $data['username'];
                return 1;
            }
        }
    }
}