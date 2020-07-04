<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Commodity_model extends Model
{
    protected $table = 'commodity';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug'];

    public function getCommodity($slug = false)
    {
        if ($slug == false) return $this->findAll();
        return $this->where(['slug' => $slug])->first();
    }
}
