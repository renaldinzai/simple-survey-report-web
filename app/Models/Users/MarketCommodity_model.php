<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class MarketCommodity_model extends Model
{
    protected $table = 'commodity_markets';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_commodity', 'id_market', 'surveyor', 'price', 'survey_date', 'status'];

    public function getMarketCommodity($slug = false, $surveyor = false)
    {
        if ($slug == false) {
            $query = $this->query('
                SELECT c.name AS commodity_name, cm.id AS id, m.name AS market_name, price, status, surveyor, survey_date
                FROM commodity_markets cm
                INNER JOIN commodity c ON cm.id_commodity = c.id
                INNER JOIN market m ON cm.id_market = m.id
            ');
            return ($query->getResultArray() !== NULL) ? $query->getResultArray() : false;
        } else {
            $query = "
                SELECT c.name AS commodity_name, m.name AS market_name, price, status, survey_date
                FROM commodity_markets cm
                INNER JOIN commodity c ON cm.id_commodity = c.id
                INNER JOIN market m ON cm.id_market = m.id 
                WHERE c.slug = ? AND surveyor = ?
            ";
            $query = $this->query($query, [$slug, $surveyor]);
            return ($query->getResultArray() !== NULL) ? $query->getResultArray() : false;
        }
    }

    public function getMarketCommodityById($id)
    {
        $query = "
                SELECT c.name AS commodity_name, cm.id AS id, m.name AS market_name, price, status, surveyor, survey_date
                FROM commodity_markets cm
                INNER JOIN commodity c ON cm.id_commodity = c.id
                INNER JOIN market m ON cm.id_market = m.id
                WHERE cm.id = ?
            ";
        $query = $this->query($query, [$id]);
        return ($query->getResult() !== NULL) ? $query->getRowArray() : false;
    }

    public function getMarketCommodityVerified()
    {
        $query = $this->query("
                SELECT c.name AS commodity_name, m.name AS market_name, price, survey_date
                FROM commodity_markets cm
                INNER JOIN commodity c ON cm.id_commodity = c.id
                INNER JOIN market m ON cm.id_market = m.id
                WHERE status = 'verified'
            ");
        return ($query->getResultArray() !== NULL) ? $query->getResultArray() : false;
    }
}
