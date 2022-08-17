<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Controllers\BaseController;

class AssetScan extends BaseController
{
    protected $asetModel;

    public function __construct()
    {
        $this->asetModel = new AsetModel();

        helper('form');
    }

    public function index() 
    {
        $data = [
            'title' => 'Search Asset',
        ];

        return view('AssetScan/index', $data);
    }

    public function getAsset() {
        $asetModel = new AsetModel();
        $kode = $this->request->getVar("kode") ?? "";
        return $this->response->setJSON($asetModel->getByKB($kode));
    }
}