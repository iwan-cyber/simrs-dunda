<?php

namespace App\Controllers\Master;

use App\Models\Master\RuanganModel;

class Ruangan extends \App\Controllers\BaseController
{

    public function index()
    {

        $data = [];

        $data['content'] = [
            'TITLE'=>'Data Ruangan',
            'DESC'=>'Pengelolaan Data Ruangan',
        ];


        $data['content']['ITEM'] = [
            ['LINK'=>'#', 'DESC'=>'Master'],
            ['LINK'=>'#', 'DESC'=>'Ruangan']
        ];

        $this->startTema();
        echo view('mega/box/content-header', $data);
        echo view('master/ruangan/ruangan');
        echo view('mega/box/content-footer');
        $this->endTema();
        
    }

    public function data() 
    {

        $ruangan = new RuanganModel();

        //var_dump($ruangan->getAll());
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $ruangan->getAll();
        
        foreach ($data as $row)
        {
            $id = $row->ID;
            $url['EDIT'] = base_url('masuk/tambah/'.$row->ID);
            $url['HAPUS'] = base_url('masuk/detail/'.$row->ID);

            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">
                        <button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light"><i class="ti-close"></i>Edit</button>
                        <button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light"><i class="ti-pencil"></i>Hapus</button>
                    </div>';
                    
            

            $list[] = [
                $row->ID,
                $row->RUANGAN,
                $row->NAMA_UNIT_LAYANAN,
                $tombol
         ];

        }
        
        $json_data = array(
                "draw"            => intval($this->request->getPost('draw')),
                "recordsTotal"    => intval($length),
                "recordsFiltered" => intval($length),
                "data"            => $list
        );
        
        

        $this->response->setJSON($json_data);
        $this->response->send();
    }

    public function simpan()
    {
        
        if ($this->request->isAJAX())
        {
            $ruangan = new RuanganModel();

            $data = [
                'RUANGAN'=>$this->request->getPost('RUANGAN')
            ];

            $insert = $ruangan->insert($data);
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

    public function startTema()
    {
        echo view('mega/box/header');
        echo view('mega/box/navbar');
        echo view('mega/box/sidebar-menu');
    }

    public function endTema()
    {
        echo view('mega/box/script');
        echo view('mega/box/footer');
    }





}
