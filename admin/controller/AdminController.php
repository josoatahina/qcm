<?php

class AdminController extends Admin
{
    public function __construct()
    {
        try {
            parent::__construct();
            $this->addAdmin();
        } catch(Exception $e) {
            die('Erreur de la classe AdminController : ' . $e->getMessage());
        }
    }

    public function index()
    {
        /** */
    }

    public function login($data)
    {
        $admin = $this->getUserByUsername($data['username']);
        if($admin->num_rows > 0) {
            $admin = $admin->fetch_assoc();
            if($admin['psswd'] == md5($data['psswd']) && $admin['is_admin'] == true) {
                $_SESSION['admin'] = $data['username'];
                echo 1;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /qcm/admin/');
    }
}