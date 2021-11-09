<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OtentikasiModel;
use CodeIgniter\API\ResponseTrait;

class Otentikasi extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // $validation = \Config\Services::validation();
        // $aturan = [
        //     'username' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Username has been required!',
        //         ],
        //     ],
        //     'password' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Password has been required!',
        //         ],
        //     ]
        // ];
        // $validation->setRules($aturan);
        // if (!$validation->withRequest($this->request)->run()) {
        //     return $this->fail($validation->getErrors());
        // }

        // $username = $this->request->getVar('username');
        // $password = $this->request->getVar('password');

        $model = new OtentikasiModel();

        $username = 'SatDirPwt';
        $password = ''; // password : $2y$10$pHm9UMHxsxPfrzbV7TOcPu0pOotKLN5EQc7psipns/ciaNGZAs9aS

        $data = $model->getUsername($username);
        if (password_verify($password, $data['password'])) {
            return $this->fail('Password tidak sesuai');
        }

        helper('jwt_helper');

        $response = [
            'message' => 'Otentikasi berhasil ditambahkan',
            'data' => $data,
            'access_token' => createJWT($username),
        ];

        return $this->respond($response);
    }
}
