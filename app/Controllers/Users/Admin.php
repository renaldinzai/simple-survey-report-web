<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Users\Commodity_model;
use App\Models\Users\Market_model;
use App\Models\Users\MarketCommodity_model;

class Admin extends BaseController
{

    protected $commodityModel;
    protected $marketModel;
    protected $marketCommodityModel;

    public function __construct()
    {
        $this->commodityModel = new Commodity_model();
        $this->marketModel = new Market_model();
        $this->marketCommodityModel = new MarketCommodity_model;
    }

    public function index()
    {

        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Admin Panel'
        ];

        return view('admin/index', $data);
    }

    public function commodity()
    {

        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Komoditas',
            'validation' => \Config\Services::validation(),
            'commodity' => $this->commodityModel->getCommodity()
        ];

        return view('/admin/commodity', $data);
    }

    public function createCommodity()
    {

        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Tambah Komoditas',
            'validation' => \Config\Services::validation()
        ];

        return view('/admin/createCommodity', $data);
    }

    public function processCreateCommodity()
    {
        $userValidation = ([
            'commodity_name' => [
                'rules' => 'required|is_unique[commodity.name]',
                'errors' => [
                    'required' => 'Kolom nama komoditas harus terisi',
                    'is_unique' => 'Komoditas sudah terdaftar'
                ]
            ]
        ]);

        if (!$this->validate($userValidation)) {
            $validationError = \Config\Services::validation();
            return redirect()->to('/admin/createCommodity')->withInput()->with('validation', $validationError);
        }

        $commodity_name = $this->request->getPost('commodity_name');
        $slug = url_title($commodity_name, '-', true);

        $checkIfSuccess = $this->commodityModel->save([
            'name' => $commodity_name,
            'slug' => $slug
        ]);

        if ($checkIfSuccess) {
            $this->session->setFlashdata('successMessage', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/commodity');
        } else {
            $this->session->setFlashdata('failMessage', 'Data gagal ditambahkan');
            return redirect()->to('/admin/commodity');
        }
    }

    public function market()
    {

        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Pasar',
            'validation' => \Config\Services::validation(),
            'market' => $this->marketModel->getMarket()
        ];

        return view('/admin/market', $data);
    }

    public function createMarket()
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Tambah Pasar',
            'validation' => \Config\Services::validation()
        ];

        return view('/admin/createMarket', $data);
    }

    public function processCreateMarket()
    {
        $userValidation = ([
            'market_name' => [
                'rules' => 'required|is_unique[market.name]',
                'errors' => [
                    'required' => 'Kolom nama pasar harus terisi',
                    'is_unique' => 'Pasar sudah terdaftar'
                ]
            ],
            'market_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom alamat pasar harus terisi'
                ]
            ]
        ]);

        if (!$this->validate($userValidation)) {
            $validationError = \Config\Services::validation();
            return redirect()->to('/admin/createMarket')->withInput()->with('validation', $validationError);
        }

        $market_name = $this->request->getPost('market_name');
        $slug = url_title($market_name, '-', true);
        $market_address = $this->request->getPost('market_address');

        $isSucceseded = $this->marketModel->save([
            'name' => $market_name,
            'slug' => $slug,
            'address' => $market_address
        ]);

        if ($isSucceseded) {
            $this->session->setFlashdata('successMessage', 'Data berhasil ditambahkan');
            return redirect()->to('/admin/market');
        } else {
            $this->session->setFlashdata('failMessage', 'Data gagal ditambahkan');
            return redirect()->to('/admin/market');
        }
    }

    public function marketCommodity()
    {

        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Komoditas',
            'validation' => \Config\Services::validation(),
            'market_commodity' => $this->marketCommodityModel->getMarketCommodity()
        ];

        return view('/admin/marketCommodity', $data);
    }

    public function updateCommodityStatus($id)
    {
        if (!isset($_SESSION['username'])) {
            return redirect()->to('/users');
        }

        if ($_SESSION['role'] != 'admin') {
            return redirect()->to('/users');
        }

        $data = [
            'page_title' => 'Ubah Status Komoditas',
            'mart_comm' => $this->marketCommodityModel->getMarketCommodityById($id)
        ];

        return view('/admin/updateCommodityStatus', $data);
    }

    public function processUpdateCommStatus($id)
    {
        $userValidation = ([
            'status' => [
                'rules' => 'required|is_unique[market.name]',
                'errors' => [
                    'required' => 'Pilih status yang ada pada daftar'
                ]
            ]
        ]);

        if (!$this->validate($userValidation)) {
            $validationError = \Config\Services::validation();
            return redirect()->to('/admin/updateCommodityStatus/' . $id)->withInput()->with('validation', $validationError);
        }

        $status = $this->request->getPost('status');

        $isSucceseded = $this->marketCommodityModel->update($id, [
            'status' => $status
        ]);

        if ($isSucceseded) {
            $this->session->setFlashdata('successMessage', 'Perubahan berhasil disimpan');
            return redirect()->to('/admin/marketCommodity');
        } else {
            $this->session->setFlashdata('failMessage', 'Perubahan gagal disimpan');
            return redirect()->to('/admin/marketCommodity');
        }
    }

    public function deleteMarketCommodity($id)
    {
        $this->marketCommodityModel->delete($id);
        $this->session->setFlashdata('successMessage', 'Data berhasil terhapus');
        return redirect()->to('/admin/marketCommodity');
    }
}
