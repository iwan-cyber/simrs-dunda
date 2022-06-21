<?php

namespace App\Controllers\Master\lab;

use App\Models\Master\lab\TindakanLabModel;

class TindakanLab extends \App\Controllers\BaseController
{

    public function index()
    {
        // $kelompokUji = new KelompokUjiModel();

        $data = [];

        //$data['KELOMPOK_UJI'] = $kelompokUji->findAll();
        echo view('master/lab/tindakan_lab');
       
    }

    public function data() 
    {

        $tindakanLabModel = new TindakanLabModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $tindakanLabModel->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['ID'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['NAMA_TINDAKAN'] . '"
                        nilai="' . $row['NILAI_NORMAL'] . '"
                        kelas="' . $row['IDKELAS_SETING'] . '"
                        satuan="' . $row['SATUAN'] . '">
                            <i class="ti-pencil"></i>
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['ID'],
                $row['NAMA_TINDAKAN'],
                $row['SATUAN'],
                $row['NILAI_NORMAL'],
                $row['JASA_SARANA'],
                $row['JASA_PELAYANAN'],
                $row['JUMLAH'],
                $row['STATUS'],
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

    public function tarifUmum() 
    {

        $tindakanLabModel = new TindakanLabModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $tindakanLabModel->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['ID'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['NAMA_TINDAKAN'] . '"
                        nilai="' . $row['NILAI_NORMAL'] . '"
                        kelas="' . $row['IDKELAS_SETING'] . '"
                        satuan="' . $row['SATUAN'] . '">
                            <i class="ti-pencil"></i>
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-close"></i>
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row['ID'],
                $row['NAMA_TINDAKAN'],
                $row['SATUAN'],
                $row['NILAI_NORMAL'],
                $row['JASA_SARANA'],
                $row['JASA_PELAYANAN'],
                $row['JUMLAH'],
                $row['STATUS'],
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

            $tindakanLabModel = new TindakanLabModel();

            $data = [
                'NAMA_TINDAKAN'=>$this->request->getPost('NAMA_TINDAKAN'),
                'SATUAN'=>$this->request->getPost('SATUAN'),
                'NILAI_NORMAL'=>$this->request->getPost('NILAI_NORMAL'),
                'IDKELAS_SETING'=>$this->request->getPost('IDKELAS_SETING'),
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $tindakanLabModel->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $tindakanLabModel->update($id, $data);
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
                $tindakanLabModel = new TindakanLabModel();
                $hapus = $tindakanLabModel->delete($id);

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
