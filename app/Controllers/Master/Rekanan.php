<?php

namespace App\Controllers\Master;

use App\Models\Master\RekananModel;

class Rekanan extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('master/rekanan');
       
    }

    public function data() 
    {

        $rekanan = new RekananModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $rekanan->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['ID_REKANAN'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        rekanan="' . $row['REKANAN'] . '"
                        alamat="' . $row['ALAMAT'] . '"
                        jenis="' . $row['JENIS'] . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['ID_REKANAN'],
                $row['REKANAN'],
                $row['ALAMAT'],
                $row['JENIS'],
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

            $rekanan = new RekananModel();

            $data = [
                'REKANAN'=>$this->request->getPost('REKANAN'),
                'JENIS'=>$this->request->getPost('JENIS'),
                'ALAMAT'=>$this->request->getPost('ALAMAT'),
            ];

            if(empty($this->request->getPost('ID_REKANAN')))
            {
                $proses = $rekanan->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID_REKANAN');
                $proses = $rekanan->update($id, $data);
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
                $rekanan = new RekananModel();
                $hapus = $rekanan->delete($id);

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
