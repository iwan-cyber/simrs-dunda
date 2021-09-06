<?php

namespace App\Controllers\Master;

use App\Models\Master\ReferensiModel;
use App\Models\Master\ReferensiDetailModel;
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

    public function simpan()
    {

            $ref = new ReferensiModel();

            $data = [
                'REFERENSI'=>$this->request->getPost('REFERENSI'),
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $ref->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $ref->update($id, $data);
            }


            if($proses)
                $this->sukses('berhasil menyimpan data', $proses);
            else
                $this->gagal('Tidak berhasil menyimpand data', $proses);

    }

    public function simpanDetail()
    {

            $refDetail = new ReferensiDetailModel();

            $data = [
                'ID_REFERENSI'=>$this->request->getPost('ID_REFERENSI'),
                'DESKRIPSI'=>$this->request->getPost('DESKRIPSI'),
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $refDetail->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $refDetail->update($id, $data);
            }


            if($proses)
                $this->sukses('berhasil menyimpan data', $proses);
            else
                $this->gagal('Tidak berhasil menyimpand data', $proses);

    }


    public function get()
    {
        $referensi = new ReferensiModel();

        $jenis = $referensi->findAll();

        $this->sukses('Berhasil mengambil data Jenis Referensi', $jenis);
    }



    public function getDetail()
    {
        
        $request = \Config\Services::request();
            
        $idRef = $request->uri->getSegment(5);

        if( ! empty($idRef))
        {
            $refDetail = new ReferensiDetailModel();

            $getDetail = $refDetail->where('ID_REFERENSI', $idRef)->findAll();

            $this->sukses('Berhasil mengambil data detail referensi', $getDetail);
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

                $ref = new ReferensiModel();
                $refDetail = new ReferensiDetailModel();

                $hapus['REFERENSI'] = $ref->delete($id);
                $hapus['REFERENSI_DETAIL'] = $refDetail->where('ID_REFERENSI', $id)->delete();

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

    public function hapusDetail()
    {
        if($this->request->isAJAX())
        {

            $request = \Config\Services::request();
            
            $id = $request->uri->getSegment(4);

            if( ! empty($id))
            {
                $refDetail = new ReferensiDetailModel();
                $hapus = $refDetail->delete($id);

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
