<?php

namespace App\Controllers\Master;

use App\Models\Master\KamarModel;
use App\Models\Master\UnitModel;
use App\Models\Master\RuanganModel;
use App\Models\Master\KelasModel;


class Kamar extends \App\Controllers\BaseController
{

    public function index()
    {
        
        $unit = new UnitModel();
        $kelas = new KelasModel();

        $kamar['UNIT'] = $unit->get(2); // 2 = instalasi rawat inap
        $kamar['KELAS'] = $kelas->findAll();

        
        echo view('master/kamar', $kamar);
    }

    public function data() 
    {

        $kamar = new KamarModel();
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $kamar->findAll();
        
        foreach ($data as $row)
        {
            $id = $row->ID;

            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        data-kamar=\'' . json_encode($row) . '\'>
                            <i class="ti-close"></i>Edit
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            <i class="ti-pencil"></i>Hapus
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row->ID,
                $row->KODE,
                $row->NAMA_KAMAR,
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

    public function get()
    {
        
        $request = \Config\Services::request();
        $id_unit = $request->uri->getSegment(4);

        $kamar = new KamarModel();
        $get = $kamar->get($id_unit);

        
        $this->sukses('Berhasil mengambil data kamar', $get);
    }




    public function simpan()
    {

            $kamar = new KamarModel();

            $data = [
                'KODE'=>$this->request->getPost('KODE'),
                'NAMA_KAMAR'=>$this->request->getPost('NAMA_KAMAR'),
                'ID_RUANGAN'=>$this->request->getPost('ID_RUANGAN'),
                'IDKELAS'=>$this->request->getPost('IDKELAS')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $kamar->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $kamar->update($id, $data);
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
                $kamar = new KamarModel();
                $hapus = $kamar->delete($id);

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
