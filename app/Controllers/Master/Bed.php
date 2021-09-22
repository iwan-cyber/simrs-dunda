<?php

namespace App\Controllers\Master;

use App\Models\Master\BedModel;
use App\Models\Master\UnitModel;
use App\Models\Master\RuanganModel;
use App\Models\Master\KelasModel;


class Bed extends \App\Controllers\BaseController
{

    public function index()
    {

        $unit = new UnitModel();
        $kelas = new KelasModel();

        $bed['UNIT'] = $unit->get(2); // 2 = instalasi rawat inap
        $bed['KELAS'] = $kelas->findAll();

        echo view('master/bed', $bed);
        
        
    }

    public function data() 
    {

        $bed = new BedModel();
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $bed->findAll();
        
        foreach ($data as $row)
        {
            $id = $row->ID;

            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        data-bed=\'' . json_encode($row) . '\'>
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
        $id_kamar = $request->uri->getSegment(4);

        $bed = new BedModel();
        $get = $bed->get($id_kamar);

        
        $this->sukses('Berhasil mengambil data bed', $get);
    }




    public function simpan()
    {

            $bed = new BedModel();

            $data = [
                'KODE_BED'=>$this->request->getPost('KODE_BED'),
                'NO_BED'=>$this->request->getPost('NO_BED'),
                'IDKAMAR'=>$this->request->getPost('IDKAMAR')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $bed->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $bed->update($id, $data);
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
                $bed = new BedModel();
                $hapus = $bed->delete($id);

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
