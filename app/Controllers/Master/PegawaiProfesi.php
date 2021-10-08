<?php

namespace App\Controllers\Master;

use App\Models\Master\PegawaiProfesiModel;
use App\Models\Master\PegawaiModel;
use App\Models\Master\PegawaiKelompokModel;
use App\Models\Master\UnitModel;

class PegawaiProfesi extends \App\Controllers\BaseController
{

    public function index()
    {

        $pegawaiKelompok = new PegawaiKelompokModel();
        $pegawai = new PegawaiModel();

        $data['KELOMPOK'] = $pegawaiKelompok->findAll();
        $data['PEGAWAI'] = $pegawai->findAll();


        echo view('master/pegawaiProfesi', $data);
        
        
    }    

    public function data() 
    {

        $pegawai = new PegawaiProfesiModel();

        //var_dump($pegawai->getAll());
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $pegawai->findAll();
        
        foreach ($data as $row)
        {
            $id = $row['ID'];
            
            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        data-pegawai="' . json_encode($row) . '">
                            <i class="ti-close"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-pencil"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
    
            $list[] = [
                $row['ID'],
                $row['NAMA_PEGAWAI'],
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
        $pegawai = new PegawaiProfesiModel();

        $register = $pegawai->findAll();

        $this->sukses('Berhasil mengambil data register', $register);

    }

    public function get()
    {

        $request = \Config\Services::request();
        $idprofesi = $request->uri->getSegment(4);


        $pegawaiProfesi = new PegawaiProfesiModel();
        $register = $pegawaiProfesi->get($idprofesi);
        
        $this->sukses('Berhasil mengambil data register', $register);

    }


    public function simpan()
    {

        $pegawai = new PegawaiModel();

        $id = $this->request->getPost('ID');

        $data = [
            'IDKELOMPOK_PEGAWAI'=>$this->request->getPost('IDKELOMPOK_PEGAWAI')
        ];

        $proses = $pegawai->update($id, $data);
            
        if($proses)
            $this->sukses('berhasil menyimpan data kelompok pegawai', $proses);
        else
            $this->gagal('Tidak berhasil menyimpand data kelompok pegawai', $proses);

    }

    public function hapus()
    {
        $request = \Config\Services::request();
        $id = $request->uri->getSegment(5);

        $data = [ 'IDKELOMPOK_PEGAWAI'=>NULL];

        

        if( ! empty($id))
        {
            $pegawai = new PegawaiModel();
            $hapus = $pegawai->update($id, $data);

            if($hapus)
                $this->sukses('Berhasil menghapus profesi', $hapus);
            else
                $this->gagal('Tidak berhasil menghapus profesi', $hapus);
        }
        else
        {
            $this->gagal('ID Hapus tidak di kirim', $id);
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
