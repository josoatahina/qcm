<?php

class UserController extends Users
{
    public function index()
    {
        echo "test";
    }

    public function logout()
    {
        session_destroy();
        header('Location: /qcm/');
    }
}