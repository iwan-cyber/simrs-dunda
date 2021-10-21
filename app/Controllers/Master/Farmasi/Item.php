<?php

namespace App\Controllers\Master\Farmasi;

use App\Models\Master\Farmasi\ItemModel;

class Item extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('master/farmasi/item');
       
    }

    public function data() 
    {

        $item = new ItemModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $item->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['id'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['nama_item'] . '"
                        besar="' . $row['sat_besar'] . '"
                        kecil="' . $row['sat_kecil'] . '"
                        frac="' . $row['frac'] . '"
                        jenis="' . $row['jenis'] . '"
                        golongan="' . $row['golongan'] . '">
                            <i class="ti-pencil"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['kode_item'],
                $row['nama_item'],
                $row['sat_besar'],
                $row['sat_kecil'],
                $row['frac'],
                $row['golongan'],
                $row['jenis'],
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

            $item = new ItemModel();

            $data = [
                'kode_item'=>$this->request->getPost('kode_item'),
                'nama_item'=>$this->request->getPost('nama_item'),
                'sat_besar'=>$this->request->getPost('sat_besar'),
                'sat_kecil'=>$this->request->getPost('sat_kecil'),
                'frac'=>$this->request->getPost('frac'),
                'golongan'=>$this->request->getPost('golongan'),
            ];

            if(empty($this->request->getPost('id')))
            {
                $proses = $item->insert($data);
            }
            else
            {
                $id = $this->request->getPost('id');
                $proses = $item->update($id, $data);
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
                $item = new ItemModel();
                $hapus = $item->delete($id);

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
