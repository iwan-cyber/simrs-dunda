<?php

namespace App\Controllers\Master;

use App\Models\Master\RuanganModel;
use App\Models\Master\UnitModel;

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

        //isi view ruangan
        $unit = new UnitModel();

        $ruangan['UNIT'] = $unit->findAll();
        
        echo view('master/ruangan/ruangan', $ruangan);
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


            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        ruangan="' . $row->RUANGAN . '"
                        unit="' . $row->ID_UNIT . '">
                            <i class="ti-close"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-pencil"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

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

            $ruangan = new RuanganModel();

            $data = [
                'RUANGAN'=>$this->request->getPost('RUANGAN'),
                'IDUNITLAYANAN'=>$this->request->getPost('IDUNITLAYANAN')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $ruangan->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $ruangan->update($id, $data);
            }


            if($proses)
                $this->sukses('berhasil menyimpan data', $proses);
            else
                $this->gagal('Tidak berhasil menyimpand data', $proses);

    }

    public function hapus()
    {
        if($this->request->isAJAX())
        {

            $request = \Config\Services::request();
            
            $id = $request->uri->getSegment(4);

            if( ! empty($id))
            {
                $ruangan = new RuanganModel();
                $hapus = $ruangan->delete($id);

                if($hapus)
                    $this->sukses('Berhasil menghapus Item', $hapus);

                else
                    $this->gagal('Tidak berhasil menghapus item', $hapus);
            }
            else
            {
                $this->gagal('ID Hapus tidak di kirim', $id);
            }
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
        echo view('mega/box/footer');
    }





}