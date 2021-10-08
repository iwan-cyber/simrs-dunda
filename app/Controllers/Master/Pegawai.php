<?php

namespace App\Controllers\Master;

use App\Models\Master\PegawaiModel;
use App\Models\Master\UnitModel;

class Pegawai extends \App\Controllers\BaseController
{

    public function index()
    {
       
        echo view('master/pegawai');
    }    

    public function data() 
    {

        $pegawai = new PegawaiModel();

        //var_dump($pegawai->getAll());
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $pegawai->findAll();
        
        foreach ($data as $row)
        {
            $id = $row['ID'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        data-pegawai="' . json_encode($row) . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
    
            $list[] = [
                $row['ID'],
                $row['NIK'],
                $row['NAMA_PEGAWAI'],
                $row['JENKEL'],
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
        $pegawai = new PegawaiModel();

        $register = $pegawai->findAll();

        $this->sukses('Berhasil mengambil data register', $register);


    }

    public function simpan()
    {

            $pegawai = new PegawaiModel();

            $data = [
                'NIK'=>$this->request->getPost('NIK'),
                'NAMA_PEGAWAI'=>$this->request->getPost('NAMA_PEGAWAI'),
                'JENKEL'=>$this->request->getPost('JENKEL'),
                'NIP'=>$this->request->getPost('NIP')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $pegawai->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $pegawai->update($id, $data);
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
                $pegawai = new PegawaiModel();
                $hapus = $pegawai->delete($id);

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
