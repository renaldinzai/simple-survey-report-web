<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Users\Commodity_model;
use App\Models\Users\Market_model;
use App\Models\Users\MarketCommodity_model;

class Surveyor extends BaseController
{

    protected $commodityModel;
    protected $marketModel;
    protected $marketCommodityModel;

    public function __construct()
    {
        $this->commodityModel = new Commodity_model;
        $this->marketModel = new Market_model;
        $this->marketCommodityModel = new MarketCommodity_model;
    }

    public function index()
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'surveyor') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Surveyor Panel'
        ];

        return view('surveyor/index', $data);
    }

    public function commodity()
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'surveyor') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Komoditas',
            'commodities' => $this->commodityModel->getCommodity()
        ];

        return view('surveyor/commodity', $data);
    }

    public function detail($slug)
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'surveyor') {
            return redirect()->to('/users');
        }

        $surveyor = $_SESSION['username'];

        $data = [
            'page_title' => 'Detail Komoditas',
            'commodity' => $this->commodityModel->getCommodity($slug),
            'market_commodity' => $this->marketCommodityModel->getMarketCommodity($slug, $surveyor)
        ];

        return view('surveyor/detail', $data);
    }

    public function insertPrice($slug)
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'surveyor') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Input Harga Komoditas',
            'commodities' => $this->commodityModel->getCommodity($slug),
            'market' => $this->marketModel->getMarket(),
            'validation' => \Config\Services::validation()
        ];

        return view('surveyor/insertPrice', $data);
    }

    public function processInsertPrice($commodity_slug)
    {
        $userValidation = ([
            'market_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silakan pilih pasar yang terdaftar'
                ]
            ],
            'date' => [
                'rules' => 'required|valid_date|max_date_today',
                'errors' => [
                    'required' => 'Kolom tanggal harus terisi',
                    'valid_date' => 'Harap menggunakan format tanggal yang benar',
                    'max_date_today' => 'Tanggal tidak boleh melebihi hari ini'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric|is_natural',
                'errors' => [
                    'required' => 'Kolom harga harus terisi',
                    'numeric' => 'Kolom harga hanya boleh berisi angka',
                    'is_natural' => 'Kolom harga hanya boleh berisi angka nernilai positif'
                ]
            ]
        ]);

        if (!$this->validate($userValidation)) {
            $validationError = \Config\Services::validation();
            return redirect()->to('/surveyor/insertPrice/' . $commodity_slug)->withInput()->with('validation', $validationError);
        }

        $market_name = $this->request->getPost('market_name');
        $slug_market = url_title($market_name, '-', true);

        $market = $this->marketModel->getMarket($slug_market);
        $commodity = $this->commodityModel->getCommodity($commodity_slug);

        $market_id = $market['id'];
        $commodity_id = $commodity['id'];

        $surveyor = $_SESSION['username'];
        $price = $this->request->getPost('price');
        $date = $this->request->getPost('date');

        $checkIfSuccess = $this->marketCommodityModel->save([
            'id_commodity' => $commodity_id,
            'id_market' => $market_id,
            'surveyor' => $surveyor,
            'price' => $price,
            'survey_date' => $date,
            'status' => 'unverified'
        ]);

        if ($checkIfSuccess) {
            $this->session->setFlashdata('successMessage', 'Data berhasil ditambahkan');
            return redirect()->to('/surveyor/commodity/' . $commodity_slug);
        } else {
            $this->session->setFlashdata('failMessage', 'Data gagal ditambahkan');
            return redirect()->to('/surveyor/commodity/' . $commodity_slug);
        }
    }
}
