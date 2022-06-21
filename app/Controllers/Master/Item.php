<?php

namespace App\Controllers\Master;

use App\Models\Master\ItemModel;

class Item extends \App\Controllers\BaseController
{

    public function index()
    {

        $data = [];

        $data['content'] = [
            'TITLE'=>'Data Item Obat',
            'DESC'=>'Pengelolaan Data Item Obat',
        ];

        $data['content']['ITEM'] = [
            ['LINK'=>'#', 'DESC'=>'Master'],
            ['LINK'=>'#', 'DESC'=>'Item Obat']
        ];

        $this->startTema();
        echo view('mega/box/content-header', $data);
        echo view('master/item');
        echo view('mega/box/content-footer');
        $this->endTema();
        
    }

    public function data() 
    {

        $item = new ItemModel();
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $item->findAll();
        
        foreach ($data as $row)
        {
            $ID = $row->ID;

            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $ID . '" 
                        onclick="edit(' . $ID . ')"
                        data-item=\'' . json_encode($row) . '\'>
                            <i class="ti-pencil"></i>
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_' . $ID . '" 
                        onclick="konfirmasi_hapus(' . $ID . ')">
                            <i class="ti-close"></i>
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    
            

            $list[] = [
                $row->KODE_ITEM,
                $row->NAMA_ITEM,
                $row->JENIS,

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

        $item = new ItemModel();
        $get = $item->get($id_unit);

        
        $this->sukses('Berhasil mengambil data item', $get);
    }

    public function simpan()
    {

            $item = new ItemModel();

            $data = [
                'KODE_ITEM'=>$this->request->getPost('KODE_ITEM'),
                'NAMA_ITEM'=>$this->request->getPost('NAMA_ITEM'),
                'SAT_BESAR'=>$this->request->getPost('SAT_BESAR'),
                'SAT_KECIL'=>$this->request->getPost('sAT_KECIL'),
                'FRAC'=>$this->request->getPost('FRAC'),
                'JENIS'=>$this->request->getPost('JENIS'),
                'GOLONGAN'=>$this->request->getPost('GOLONGAN'),
                'AKTIF'=>$this->request->getPost('AKTIF')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $item->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
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
