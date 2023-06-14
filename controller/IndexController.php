<?php

class IndexController extends Users
{
    public function index()
    {
        if(isset($_SESSION['user'])) {
            require_once('views/home.php');
        } else {
            require_once('views/layout/user_login.php');
        }
    }

    public function register()
    {
        require_once('views/layout/user_register.php');
    }

    public function checkRegister($data)
    {
        if($data['psswd'] === $data['psswd2']) {
            $data['is_admin'] = 0;
            echo $this->addUser($data);
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