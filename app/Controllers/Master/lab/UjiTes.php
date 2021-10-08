<?php

namespace App\Controllers\Master\lab;

use App\Models\Master\lab\UjiTesModel;
use App\Models\Master\lab\KelompokUjiModel;

class UjiTes extends \App\Controllers\BaseController
{

    public function index()
    {
        $kelompokUji = new KelompokUjiModel();

        $data = [];

        $data['KELOMPOK_UJI'] = $kelompokUji->findAll();
        echo view('master/lab/uji_tes', $data);
       
    }

    public function data() 
    {

        $UjiTesModel = new UjiTesModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $UjiTesModel->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['id_uji'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        uji="' . $row['uji_tes'] . '"
                        satuan="' . $row['satuan'] . '"
                        nilai="' . $row['nilai_normal'] . '"
                        kelompok="' . $row['id_kelompok'] . '"
                        sub="' . $row['id_sub'] . '"
                        urutan="' . $row['urutan'] . '">
                            <i class="ti-pencil"></i>
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['id_uji'],
                $row['uji_tes'],
                $row['satuan'],
                $row['nilai_normal'],
                $row['urutan'],
                $row['nama_kelompok'],
                $row['nama_sub'],
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

            $UjiTesModel = new UjiTesModel();

            $data = [
                'uji_tes'=>$this->request->getPost('UJI_TES'),
                'satuan'=>$this->request->getPost('SATUAN'),
                'nilai_normal'=>$this->request->getPost('NILAI_NORMAL'),
                'urutan'=>$this->request->getPost('URUTAN'),
                'id_kelompok'=>$this->request->getPost('ID_KELOMPOK'),
                'id_sub'=>$this->request->getPost('ID_SUB'),
            ];

            if(empty($this->request->getPost('ID_UJI')))
            {
                $proses = $UjiTesModel->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID_UJI');
                $proses = $UjiTesModel->update($id, $data);
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
                $UjiTesModel = new UjiTesModel();
                $hapus = $UjiTesModel->delete($id);

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
