<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use App\Models\PekerjaanModel;

class Pekerjaan extends BaseController
{

    public function index()
    { 
        
        $db = \Config\Database::connect();

        $data = [
            'title'         => 'Data Pekerjaan',
            'subtitle'      => 'Mengatur Data Pekerjaan',
            'isi'           => 'master/v_pekerjaan',
        ];

        echo view('layout/v_wrapper', $data);
    }

    public function dataPekerjaan()
    {
        return DataTables::use('m_pekerjaan')->make();
    }

    public function simpan()
    {
        
        if ($this->request->isAJAX())
        {
            $pekerjaan = new PekerjaanModel();

            $data = [
                'PEKERJAAN'=>$this->request->getPost('PEKERJAAN')
            ];

            $insert = $pekerjaan->insert($data);
            $this->sukses('berhasil menyimpan data', $insert);

        }

    }

    public function sukses($pesan='', $data=[])
    {
        $data = [
            'RESULT'=>true,
            'PESAN'=>$pesan,
            'DATA'=>$data
        ];

        $this->response->setJSON($data);
        $this->response->send();
    }    

    public function gagal($pesan='', $data=[])
    {
        $data = [
            'RESULT'=>false,
            'PESAN'=>$pesan,
            'DATA'=>$data
        ];

        $this->response->setJSON($data);
        $this->response->send();
    }


}
