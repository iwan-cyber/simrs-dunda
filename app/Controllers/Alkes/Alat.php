<?php

namespace App\Controllers\Alkes;

class Alat extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('alkes/alat/form_alat');
       
    }

    public function register()
    {

        echo view('alkes/alat/register_alat');
       
    }

    public function data() 
    {

        $Penerimaan = new PenerimaanModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $Penerimaan->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['id'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['nama_Penerimaan'] . '"
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
                $row['kode_Penerimaan'],
                $row['nama_Penerimaan'],
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

            $Penerimaan = new PenerimaanModel();

            $data = [
                'kode_Penerimaan'=>$this->request->getPost('kode_Penerimaan'),
                'nama_Penerimaan'=>$this->request->getPost('nama_Penerimaan'),
                'sat_besar'=>$this->request->getPost('sat_besar'),
                'sat_kecil'=>$this->request->getPost('sat_kecil'),
                'frac'=>$this->request->getPost('frac'),
                'golongan'=>$this->request->getPost('golongan'),
            ];

            if(empty($this->request->getPost('id')))
            {
                $proses = $Penerimaan->insert($data);
            }
            else
            {
                $id = $this->request->getPost('id');
                $proses = $Penerimaan->update($id, $data);
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
                $Penerimaan = new PenerimaanModel();
                $hapus = $Penerimaan->delete($id);

                if($hapus)
                    $this->sukses('Berhasil menghapus Penerimaan', $hapus);

                else
                    $this->gagal('Tidak berhasil menghapus Penerimaan', $hapus);
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
