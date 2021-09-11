<?php

namespace App\Controllers\Master;

use App\Models\Master\PegawaiKelompokModel;

class PegawaiKelompok extends \App\Controllers\BaseController
{

    public function index()
    {

        $data = [];

        $data['content'] = [
            'TITLE'=>'Data Pegawai Kelompok',
            'DESC'=>'Pengelolaan Data Pegawai Kelompok',
        ];

        $data['content']['ITEM'] = [
            ['LINK'=>'#', 'DESC'=>'Master'],
            ['LINK'=>'#', 'DESC'=>'Pegawai Kelompok']
        ];

        $this->startTema();
        echo view('mega/box/content-header', $data);
        echo view('master/pegawaiKelompok');
        echo view('mega/box/content-footer');
        $this->endTema();
        
    }    

    public function data() 
    {

        $pegawai = new PegawaiKelompokModel();

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
                        data-kelompok="' . $row['KELOMPOK_PEGAWAI'] . '">
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
                $row['KELOMPOK_PEGAWAI'],
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
        $pegawai = new PegawaiKelompokModel();

        $register = $pegawai->findAll();

        $this->sukses('Berhasil mengambil data register', $register);


    }

    public function simpan()
    {

            $pegawai = new PegawaiKelompokModel();

            $data = [
                'KELOMPOK_PEGAWAI'=>$this->request->getPost('KELOMPOK_PEGAWAI')
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
                $pegawai = new PegawaiKelompokModel();
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
