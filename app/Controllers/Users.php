<?php

namespace App\Controllers;

use App\Models\Users_model;

class Users extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users_model();
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            return redirect()->to('/' . $_SESSION['role']);
        }

        $data = [
            'page_title' => 'Login Dashboard',
            'validation' => \Config\Services::validation()
        ];

        return view('/users', $data);
    }

    public function login()
    {
        if (isset($_POST)) {
            $userValidation = ([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus terisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus terisi'
                    ]
                ]
            ]);

            if (!$this->validate($userValidation)) {
                $validationError = \Config\Services::validation();
                return redirect()->to('/users')->withInput()->with('validation', $validationError);
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $checkLogin = $this->usersModel->checkLogin($username, $password);

            if ($checkLogin > 0) {
                $role = $checkLogin;
                if ($role == 1) {
                    $this->session->set('role', 'admin');
                    $this->session->set('username', $username);
                    return redirect()->to('/admin');
                } else if ($role == 2) {
                    $this->session->set('role', 'surveyor');
                    $this->session->set('username', $username);
                    return redirect()->to('/surveyor');
                }
            } else {
                $this->session->setFlashdata('message', 'Nama pengguna atau kata sandi salah');
                return redirect()->to('/users');
            }
        } else {
            return redirect()->to('/users');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/users');
    }

    //--------------------------------------------------------------------

}
