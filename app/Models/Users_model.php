<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password'];

    public function checkLogin($username, $password)
    {
        $checkUsernameResult = $this->checkUsername($username);
        if ($checkUsernameResult != false) {
            foreach ($checkUsernameResult as $cur) {
                $hashedPassword = $cur['password'];
                $role = $cur['role'];
            }
            return (password_verify($password, $hashedPassword)) ? $role : false;
        } else {
            return false;
        }
    }

    public function checkUsername($username)
    {
        $builder = $this->builder();
        $query = $builder->where('username', $username)->get();
        if ($query->getResultArray() !== NULL) return $query->getResultArray();
        else return false;
    }
}
