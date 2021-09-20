<?php

namespace App\Controllers\Master;

use App\Models\Master\UnitModel;
use App\Models\Master\RuanganModel;


class Unit extends \App\Controllers\BaseController
{

    public function index()
    {
        echo view('master/unit');
    }

    public function data() 
    {

        $unit = new UnitModel();

        //var_dump($unit->getAll());
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $unit->getAll();
        
        foreach ($data as $row)
        {
            $id = $row->ID;
            
            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        unit="' . $row->RUANGAN . '"
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

    public function register()
    {
        $unit = new UnitModel();

        $register = $unit->findAll();

        $this->sukses('Berhasil mengambil data register', $register);
    }    

    public function instalasi()
    {
        $unit = new UnitModel();

        $request = \Config\Services::request();
            
        $id_instalasi = $request->uri->getSegment(4);

        

        // $register = $unit->get();

        // $this->sukses('Berhasil mengambil data register', $register);
    }    

    public function get()
    {
        
        $request = \Config\Services::request();
        $id_unit = $request->uri->getSegment(4);

        $ruangan = new RuanganModel();
        $get = $ruangan->get($id_unit);

        
        $this->sukses('Berhasil mengambil data ruangan', $get);
    }

    public function simpan()
    {

            $unit = new UnitModel();

            $data = [
                'NAMA_UNIT_LAYANAN'=>$this->request->getPost('NAMA_UNIT_LAYANAN'),
                'IDINSTALASI'=>$this->request->getPost('IDINSTALASI')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $unit->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $unit->update($id, $data);
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
                $unit = new UnitModel();
                $hapus = $unit->delete($id);

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

}
