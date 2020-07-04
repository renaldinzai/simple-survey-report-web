<?php

namespace App\Controllers;

use App\Models\Users\MarketCommodity_model;

class Home extends BaseController
{

	protected $marketCommodityModel;

	public function __construct()
	{
		$this->marketCommodityModel = new MarketCommodity_model;
	}

	public function index()
	{
		$data = [
			'page_title' => 'Daftar Harga Komoditas',
			'market_commodity' => $this->marketCommodityModel->getMarketCommodityVerified()
		];

		return view('main', $data);
	}

	//--------------------------------------------------------------------

}
