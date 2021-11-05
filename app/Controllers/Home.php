<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $asetModel;
    protected $userModel;

    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'dataAset' => $this->asetModel->countAllResults(),
            'dataAdmin' => $this->userModel->where('role', 2)->countAllResults(),
            'dataUser' => $this->userModel->where('role', 3)->countAllResults(),
            'dataUser' => $this->userModel->where('role', 3)->countAllResults(),
            'dataAsetDelete' => $this->asetModel->onlyDeleted()->countAllResults(),
        ];

        return view('home/index', $data);
    }
}
