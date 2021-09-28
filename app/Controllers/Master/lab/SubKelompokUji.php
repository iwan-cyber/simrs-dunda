<?php

namespace App\Controllers\Master\lab;

use App\Models\Master\lab\SubKelompokUjiModel;
use App\Models\Master\lab\KelompokUjiModel;

class SubKelompokUji extends \App\Controllers\BaseController
{

    public function index()
    {
        $kelompokUji = new KelompokUjiModel();

        $data = [];

        $data['KELOMPOK_UJI'] = $kelompokUji->findAll();
        echo view('master/lab/subkelompok_uji', $data);
       
    }

    public function data() 
    {

        $subKelompokUji = new SubKelompokUjiModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $subKelompokUji->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['id_sub'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['nama_sub'] . '"
                        kelompok="' . $row['id_kelompok'] . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['id_sub'],
                $row['nama_sub'],
                $row['nama_kelompok'],
                $tombol
         ];

        }
        
        $json_data = array(
                "draw"            => intval($this->request->getGet('draw')),
                "recordsTotal"    => intval($jumlah),
                "recordsFiltered" => intval($jumlah),
                "data"            => $list
        );
        
        

        $this->response->setJSON($json_data);
        $this->response->send();
    }

    public function simpan()
    {

            $subKelompokUji = new SubKelompokUjiModel();

            $data = [
                'nama_sub'=>$this->request->getPost('nama_sub'),
                'id_kelompok'=>$this->request->getPost('id_kelompok'),
            ];

            if(empty($this->request->getPost('id_sub')))
            {
                $proses = $subKelompokUji->insert($data);
            }
            else
            {
                $id = $this->request->getPost('id_sub');
                $proses = $subKelompokUji->update($id, $data);
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
                $subKelompokUji = new SubKelompokUjiModel();
                $hapus = $subKelompokUji->delete($id);

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
