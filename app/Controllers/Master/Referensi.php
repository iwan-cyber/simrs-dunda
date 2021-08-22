<?php

namespace App\Controllers\Master;

use App\Models\Master\ReferensiModel;
use CodeIgniter\Database\Query;


class Referensi extends \App\Controllers\BaseController
{

    public function index()
    {

        $data = [];

        $data['content'] = [
            'TITLE'=>'Data Referensi',
            'DESC'=>'Pengelolaan Data Referensi',
        ];

        $data['content']['ITEM'] = [
            ['LINK'=>'#', 'DESC'=>'Master'],
            ['LINK'=>'#', 'DESC'=>'Referensi']
        ];

        $this->startTema();
        echo view('mega/box/content-header', $data);
        echo view('master/referensi');
        echo view('mega/box/content-footer');
        $this->endTema();
        
    }

    public function jenis()
    {
        $referensi = new ReferensiModel();

        $jenis = $referensi->findAll();

        $this->sukses('Berhasil mengambil data Jenis Referensi', $jenis);
    } 

    public function get()
    {
        
        $request = \Config\Services::request();
            
        $idRef = $request->uri->getSegment(4);

        if( ! empty($idRef))
        {
            $ref = $this->db->table('m_ref_detail')->where('ref', $idRef)->get();
            $data = $ref->getResultArray();

            $this->sukses('Berhasil mengambil data detail referensi', $data);
            
            
        }
        else
        {
            $this->gagal('ID ref tidak dikirim', $id);
        }

    }    

    public function hapus()
    {
        if($this->request->isAJAX())
        {

            $request = \Config\Services::request();
            
            $id = $request->uri->getSegment(4);

            if( ! empty($id))
            {
                $bed = new ReferensiModel();
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
