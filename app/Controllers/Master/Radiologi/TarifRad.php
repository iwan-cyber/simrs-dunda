<?php

namespace App\Controllers\Master\Radiologi;

use App\Models\Master\Radiologi\TarifRadModel;

class TarifRad extends \App\Controllers\BaseController
{

    public function index()
    {
        // $kelompokUji = new KelompokUjiModel();

        $data = [];

        //$data['KELOMPOK_UJI'] = $kelompokUji->findAll();
        echo view('master/radiologi/tarif_rad');
       
    }

    public function data() 
    {

        $tarifRadModel = new TarifRadModel();

        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');

        $list = [];

        $data = $tarifRadModel->get($_GET);

        // var_dump($data);

        $jumlah = $data['JUMLAH'];
        
        foreach ($data['DATA'] as $row)
        {
            $id = $row['ID'];
            
            $edit = '<button type="button" class="btn btn-info btn-mini waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        nama="' . $row['NAMA_TINDAKAN'] . '"
                        vip="' . $row['VIP'] . '"
                        vvip="' . $row['VVIP'] . '"
                        icu="' . $row['ICU'] . '"
                        bpjs="' . $row['BPJS'] . '"
                        bpjsri="' . $row['BPJS_RI'] . '"
                        kategori="' . $row['KATEGORI'] . '"
                        3="' . $row['3'] . '"
                        2="' . $row['2'] . '"
                        1="' . $row['1'] . '">
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
                $row['3'],
                $row['2'],
                $row['1'],
                $row['VIP'],
                $row['VVIP'],
                $row['ICU'],
                $row['BPJS'],
                $row['BPJS_RI'],
                $row['KATEGORI'],
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

            $tarifRadModel = new TarifRadModel();

            $data = [
                'NAMA_TINDAKAN'=>$this->request->getPost('NAMA_TINDAKAN'),
                '1'=>$this->request->getPost('1'),
                '2'=>$this->request->getPost('2'),
                '3'=>$this->request->getPost('3'),
                'VIP'=>$this->request->getPost('VIP'),
                'VVIP'=>$this->request->getPost('VVIP'),
                'ICU'=>$this->request->getPost('ICU'),
                'BPJS'=>$this->request->getPost('BPJS'),
                'BPJS_RI'=>$this->request->getPost('BPJS_RI'),
                'KATEGORI'=>$this->request->getPost('KATEGAORI'),
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $tarifRadModel->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $tarifRadModel->update($id, $data);
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
                $tarifRadModel = new TarifRadModel();
                $hapus = $tarifRadModel->delete($id);

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
