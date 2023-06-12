<?php

class UserController extends Users
{
    public function addUser($data)
    {
        $data['is_admin'] = false;
        return parent::addUser($data);
    }
}