<?php

namespace App\Controllers\Master\lab;

use App\Models\Master\lab\KelompokUjiModel;

class KelompokUji extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('master/lab/kelompok_uji');
       
    }

    public function data() 
    {

        $kelompokUji = new KelompokUjiModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $kelompokUji->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['id_kelompok'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['nama_kelompok'] . '"
                        urut="' . $row['kelompok_urut'] . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['id_kelompok'],
                $row['nama_kelompok'],
                $row['kelompok_urut'],
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

            $kelompokUji = new KelompokUjiModel();

            $data = [
                'nama_kelompok'=>$this->request->getPost('nama_kelompok'),
                'kelompok_urut'=>$this->request->getPost('kelompok_urut'),
            ];

            if(empty($this->request->getPost('id_kelompok')))
            {
                $proses = $kelompokUji->insert($data);
            }
            else
            {
                $id = $this->request->getPost('id_kelompok');
                $proses = $kelompokUji->update($id, $data);
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
                $kelompokUji = new KelompokUjiModel();
                $hapus = $kelompokUji->delete($id);

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
