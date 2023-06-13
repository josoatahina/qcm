<?php

class UserController extends Users
{
    public function register($data)
    {
        if($data['psswd'] === $data['psswd2']) {
            $data['is_admin'] = false;
            echo parent::addUser($data);
        }
    }

    public function login($data)
    {
        $user = $this->getUserByUsername($data['username']);
        if($user->num_rows > 0) {
            $user = $user->fetch_assoc();
            if($user['psswd'] == md5($data['psswd'])) {
                $_SESSION['user'] = $data['username'];
                echo 1;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /qcm/');
    }
}