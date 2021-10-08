<?php

namespace App\Controllers\Master;

use App\Models\Master\RuanganModel;
use App\Models\Master\UnitModel;
use App\Models\Master\KamarModel;

class Ruangan extends \App\Controllers\BaseController
{

    public function index()
    {

        $unit = new UnitModel();

        $ruangan['UNIT'] = $unit->findAll();
        
        echo view('master/ruangan', $ruangan);
        
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
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        ruangan="' . $row->RUANGAN . '"
                        unit="' . $row->ID_UNIT . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
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
        $ruangan = new RuanganModel();

        $register = $ruangan->findAll();

        $this->sukses('Berhasil mengambil data register', $register);


    }

    public function get()
    {
        
        $request = \Config\Services::request();
        $id_ruangan = $request->uri->getSegment(4);

        $kamar = new KamarModel();
        $get = $kamar->get($id_ruangan);

        
        $this->sukses('Berhasil mengambil data ruangan', $get);
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
}
