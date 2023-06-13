<?php

class IndexController
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
}