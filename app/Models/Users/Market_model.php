<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Market_model extends Model
{
    protected $table = 'market';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'address'];

    public function getMarket($slug = false)
    {
        if ($slug == false) return $this->findAll();
        return $this->where(['slug' => $slug])->first();
    }
}
