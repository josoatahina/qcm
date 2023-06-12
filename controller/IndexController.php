<?php

class IndexController
{
    public function index()
    {
        require_once('views/layout/user_login.php');
    }

    public function register()
    {
        require_once('views/layout/user_register.php');
    }
}