<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\UserModel;
use Endroid\QrCode\QrCode;
use App\Controllers\BaseController;
use App\Models\GedungModel;
use App\Models\RuangModel;
use Endroid\QrCode\Writer\PngWriter;
use Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Aset extends BaseController
{
    protected $userModel;
    protected $asetModel;
    protected $ruangModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->asetModel = new AsetModel();
        $this->ruangModel = new RuangModel();
        $this->gedungModel = new GedungModel();

        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Aset',
            'barang' => $this->asetModel->findAll(),
        ];

        return view('aset/index', $data);
    }

    public function history($id)
    {
        $data = [
            'title' => 'Riwayat Data Aset',
            'barang' => $this->asetModel->where('id', $id)->first(),
            'asetHistory' => $this->asetModel->getHistory($id),
        ];

        return view('aset/history', $data);
    }

    public function create()
    {
        if (session('role') == 3) {
            return redirect()->to('home');
        }

        $data = [
            'title' => 'Tambah Data Aset',
            'validation' => \Config\Services::validation(),
            'ruang' => $this->ruangModel->get()->getResultArray(),
            'gedung' => $this->gedungModel->get()->getResultArray(),
            // 'user' => $this->userModel->where('nik', session()->get('nik'))->first(),
        ];

        return view('aset/add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nomor' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Nomor Barang harus diisi!',
                    'numeric' => 'Nomor Barang harus berupa angka!'
                ]
            ],
            'sub_nomor' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Sub Nomor Barang harus diisi!',
                    'numeric' => 'Sub Nomor Barang harus berupa angka!'
                ]
            ],
            'satuan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Satuan Barang harus diisi!',
                ]
            ],
            'kode_barang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Barang harus diisi!',
                ]
            ],
            'no_aset' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Nomor Aset harus diisi!',
                    'numeric' => 'Nomor Aset harus berupa angka!'
                ]
            ],
            'tercatat' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tercatat harus diisi!',
                ]
            ],
            'kode_lokasi' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Lokasi harus diisi!',
                ]
            ],
            'kode_perkap' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Perkap harus diisi!',
                ]
            ],
            'kondisi_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kondisi Aset harus diisi!',
                ]
            ],
            'uraian_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Aset harus diisi!',
                ]
            ],
            'uraian_perkap' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Perkap harus diisi!',
                ]
            ],
            'kode_ruang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Ruang harus diisi!',
                ]
            ],
            'uraian_ruang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Ruang harus diisi!',
                ]
            ],
            'kode_gedung' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Gedung harus diisi!',
                ]
            ],
            'nominal_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nominal Aset harus diisi!',
                    'numeric' => 'Nominal Aset harus berupa angka!'
                ]
            ],
            'kondisi' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kondisi Barang harus diisi!',
                ]
            ],
            'catatan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Catatan harus diisi!',
                ]
            ],
            'nominal_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nominal harus diisi!',
                ]
            ],
            'sumber_pengadaan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Sumber Pengadaan harus diisi!',
                ]
            ],
            'tanggal_pengadaan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tanggal Pengadaan harus diisi!',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            // return $this->response->setJSON(["message" => $this->validator->getErrors()], 400);
            session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> Belum Valid!</div>');
            return redirect()->to('/aset/add')->withInput();
        }

        $fileFoto = $this->request->getFile('image');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            $namaFoto = $fileFoto->getRandomName();

            $image = \Config\Services::image()
                ->withFile($fileFoto)
                ->resize(400, 200, true, 'height')
                ->save(FCPATH . '/img/aset/' . $namaFoto);
        }

        $kode = $this->request->getVar('kode_barang');

        $writer = new PngWriter();
        $qrCode = QrCode::create($kode)->setSize(300);
        $result = $writer->write($qrCode);
        // header('Content-Type: ' . $result->getMimeType());
        $result->saveToFile(FCPATH . '/img/aset/qr/' . $qrCode->getData() . '.png');

        $dataSave = [
            'nomor' => $this->request->getVar('nomor'),
            'sub_nomor' => $this->request->getVar('sub_nomor'),
            'satuan' => $this->request->getVar('satuan'),
            'kode_barang' => $kode,
            'no_aset' => $this->request->getVar('no_aset'),
            'tercatat' => $this->request->getVar('tercatat'),
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'kode_perkap' => $this->request->getVar('kode_perkap'),
            'kondisi_aset' => $this->request->getVar('kondisi_aset'),
            'uraian_aset' => $this->request->getVar('uraian_aset'),
            'uraian_perkap' => $this->request->getVar('uraian_perkap'),
            'kode_ruang' => $this->request->getVar('kode_ruang'),
            'uraian_ruang' => $this->request->getVar('uraian_ruang'),
            'kode_gedung' => $this->request->getVar('kode_gedung'),
            'nominal_aset' => $this->request->getVar('nominal_aset'),
            'kondisi' => $this->request->getVar('kondisi'),
            'catatan' => $this->request->getVar('catatan'),
            'sumber_pengadaan' => $this->request->getVar('sumber_pengadaan'),
            'tanggal_pengadaan' => $this->request->getVar('tanggal_pengadaan'),
            'user_penginput' => session()->get('name'),
            'qr_code' => $qrCode->getData() . '.png',
            'foto' => $namaFoto,
        ];

        $cekcAset = $this->asetModel->getByKBNA($kode, $this->request->getVar("no_aset"));
        if (!empty($cekcAset)) {
            $this->asetModel->update($cekcAset['id'], $dataSave);
        } else {
            $this->asetModel->save($dataSave);
        }

        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil ditambahkan!</div>');

        return redirect()->to('aset');
        // return $this->response->setJSON([ "data" => $cekcAset, "save" => $dataSave], 200);
    }

    public function edit($id)
    {
        if (session('role') == 3) {
            return redirect()->to('home');
        }

        $data = [
            'title' => 'Ubah Data Aset',
            'validation' => \Config\Services::validation(),
            'barang' => $this->asetModel->where('id', $id)->first(),
            'ruang' => $this->ruangModel->get()->getResultArray(),
            'gedung' => $this->gedungModel->get()->getResultArray(),
            'user' => $this->userModel->where('name', session()->get('name'))->first(),
        ];

        return view('aset/edit', $data);
    }

    public function update($barangId)
    {
        if (!$this->validate([
            'nomor' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Nomor Barang harus diisi!',
                    'numeric' => 'Nomor Barang harus berupa angka!'
                ]
            ],
            'sub_nomor' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Sub Nomor Barang harus diisi!',
                    'numeric' => 'Sub Nomor Barang harus berupa angka!'
                ]
            ],
            'satuan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Satuan Barang harus diisi!',
                ]
            ],
            'kode_barang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Barang harus diisi!',
                ]
            ],
            'no_aset' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Nomor Aset harus diisi!',
                    'numeric' => 'Nomor Aset harus berupa angka!'
                ]
            ],
            'tercatat' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tercatat harus diisi!',
                ]
            ],
            'kode_lokasi' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Lokasi harus diisi!',
                ]
            ],
            'kode_perkap' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Perkap harus diisi!',
                ]
            ],
            'kondisi_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kondisi Barang harus diisi!',
                ]
            ],
            'uraian_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Aset harus diisi!',
                ]
            ],
            'uraian_perkap' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Perkap harus diisi!',
                ]
            ],
            'kode_ruang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Ruang harus diisi!',
                ]
            ],
            'uraian_ruang' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Uraian Ruang harus diisi!',
                ]
            ],
            'kode_gedung' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kode Gedung harus diisi!',
                ]
            ],
            'nominal_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nominal Aset harus diisi!',
                    'numeric' => 'Nominal Aset harus berupa angka!'
                ]
            ],
            'kondisi' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Kondisi Barang harus diisi!',
                ]
            ],
            'catatan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Catatan harus diisi!',
                ]
            ],
            'nominal_aset' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nominal harus diisi!',
                ]
            ],
            'sumber_pengadaan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Sumber Pengadaan harus diisi!',
                ]
            ],
            'tanggal_pengadaan' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tanggal Pengadaan harus diisi!',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/aset/edit/' . $barangId)->withInput();
        }

        $fileFoto = $this->request->getFile('image');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('old_image');
        } else {
            $namaFoto = $fileFoto->getRandomName();

            $image = \Config\Services::image()
                ->withFile($fileFoto)
                ->resize(400, 200, true, 'height')
                ->save(FCPATH . '/img/aset/' . $namaFoto);

            if ($image != 'default.jpg' && $namaFoto != 'default.jpg' && $this->request->getVar('old_image') != '') {
                if (file_exists(FCPATH . 'img/aset/' . $this->request->getVar('old_image'))) {
                    unlink(FCPATH . 'img/aset/' . $this->request->getVar('old_image'));
                }
            }
        }

        $kode = $this->request->getVar('kode_barang');

        $writer = new PngWriter();
        $qrCode = QrCode::create($kode)->setSize(300);
        $result = $writer->write($qrCode);
        // header('Content-Type: ' . $result->getMimeType());
        $result->saveToFile(FCPATH . '/img/aset/qr/' . $qrCode->getData() . '.png');

        $dtUpdate = [
            'id' => $barangId,
            'nomor' => $this->request->getVar('nomor'),
            'sub_nomor' => $this->request->getVar('sub_nomor'),
            'satuan' => $this->request->getVar('satuan'),
            'kode_barang' => $kode,
            'no_aset' => $this->request->getVar('no_aset'),
            'tercatat' => $this->request->getVar('tercatat'),
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'kode_perkap' => $this->request->getVar('kode_perkap'),
            'kondisi_aset' => $this->request->getVar('kondisi_aset'),
            'uraian_aset' => $this->request->getVar('uraian_aset'),
            'uraian_perkap' => $this->request->getVar('uraian_perkap'),
            'kode_ruang' => $this->request->getVar('kode_ruang'),
            'uraian_ruang' => $this->request->getVar('uraian_ruang'),
            'kode_gedung' => $this->request->getVar('kode_gedung'),
            'nominal_aset' => $this->request->getVar('nominal_aset'),
            'kondisi' => $this->request->getVar('kondisi'),
            'catatan' => $this->request->getVar('catatan'),
            'sumber_pengadaan' => $this->request->getVar('sumber_pengadaan'),
            'tanggal_pengadaan' => $this->request->getVar('tanggal_pengadaan'),
            'user_penginput' => session()->get('name'),
            'qr_code' => $qrCode->getData() . '.png',
            'foto' => $namaFoto,
        ];
        $test = $this->asetModel->ubah($barangId, $dtUpdate);

        // return ($test);
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil diubah!</div>');
        
        return redirect()->to('/aset/edit/' . $barangId);
    }

    public function delete($id)
    {
        $this->asetModel->delete($id);
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil dihapus!</div>');
        return redirect()->to('/aset');
    }

    public function trash()
    {
        if (session('role') == 3) {
            return redirect()->to('home');
        }

        $data = [
            'title' => 'Sampah Aset',
            'barang' => $this->asetModel->onlyDeleted()->findAll(),
        ];

        return view('aset/trash', $data);
    }

    public function restore($kode)
    {
        $builder = $this->db->table('barang');
        $builder->set('deleted_at', null, true)->where(['id' => $kode])->update();
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil direstore!</div>');
        return redirect()->to('/aset');
    }

    public function destroy($id)
    {
        $barang = $this->db->table('barang')->get()->getRowArray();

        try {
            if ($barang['foto'] != 'default.jpg' && $barang['foto'] != '') {
                unlink('img/aset/' . $barang['foto']);
            }

            if ($barang['qr_code'] || $barang['qr_code'] == null) {
                unlink('img/aset/qr/' . $barang['qr_code']);
            }
        } catch (\Exception $e) {
            //
        }

        $builder = $this->db->table('barang');
        $builder->delete(['id' => $id]);
        session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil dihapus permanen!</div>');
        return redirect()->to('/aset/trash');
    }

    public function excel()
    {
        if (session('role') == 3) {
            return redirect()->to('home');
        }

        $data = [
            'title' => 'Import Excel',
        ];

        return view('aset/excel', $data);
    }

    public function import()
    {
        ini_set('max_execution_time', '300');
        $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        if ($ext == 'xls') {
            $render = new Xls();
        } else {
            $render = new Xlsx();
        }

        $spreadsheet = $render->load($file);

        $sheet = $spreadsheet->getActiveSheet()->toArray();

        $dataInsert = [];
        foreach ($sheet as $x => $rowCell) {
            if ($x == 0) {
                continue;
            }

            if (($rowCell['3'] ?? "") != "" && ($rowCell['4'] ?? "") != "") {
                $writer = new PngWriter();
                $qrCode = QrCode::create($rowCell['3'])->setSize(300);
                $result = $writer->write($qrCode);
                // header('Content-Type: ' . $result->getMimeType());
                $result->saveToFile(FCPATH . '/img/aset/qr/' . $qrCode->getData() . '.png');

                $dataInsert[] = [
                    'nomor' => $rowCell['0'] ?? "",
                    'sub_nomor' => $rowCell['1'] ?? "",
                    'satuan' => $rowCell['2'] ?? "",
                    'kode_barang' => $rowCell['3'] ?? "",
                    'no_aset' => $rowCell['4'] ?? "",
                    'tercatat' => $rowCell['5'] ?? "",
                    'kode_lokasi' => $rowCell['6'] ?? "",
                    'kode_perkap' => $rowCell['7'] ?? "",
                    'kondisi_aset' => $rowCell['8'] ?? "",
                    'uraian_aset' => $rowCell['9'] ?? "",
                    'uraian_perkap' => $rowCell['10'] ?? "",
                    'kode_ruang' => $rowCell['11'] ?? "",
                    'uraian_ruang' => $rowCell['12'] ?? "",
                    'kode_gedung' => $rowCell['13'] ?? "",
                    'catatan' => $rowCell['14'] ?? "",
                    'kondisi' => $rowCell['15'] ?? "",
                    'nominal_aset' => $rowCell['16'] ?? "",
                    'foto' => $rowCell['17'] ?? "",
                    'tanggal_pengadaan' => $rowCell['18'] ?? "",
                    'sumber_pengadaan' => $rowCell['19'] ?? "",
                    'qr_code' => $qrCode->getData() . '.png',
                ];
            }
        }

        // echo "<pre>";
        // print_r($dataInsert);

        if (!empty($dataInsert)) {
            $asetModel = new AsetModel();
            $asetModel->_multi_duplicate_insert($dataInsert);
            session()->setFlashdata('message', '<div class="alert alert-success">Data <strong>aset</strong> berhasil diimport!</div>');
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger">Data <strong>aset</strong> gagal diimport!</div>');
        }


        return redirect()->to('/aset');
    }

    public function templateexcel()
    {
        return $this->response->download(FCPATH . '/assets/template/sampleImportAset.xlsx', null);
    }
}
