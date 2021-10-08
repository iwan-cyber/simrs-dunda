<?php

namespace App\Controllers\Master;

use App\Models\Master\WilayahModel;


class Wilayah extends \App\Controllers\BaseController
{

    public function index()
    {
        $WilayahModel = new WilayahModel();

        $data = [];

        $data['PROVINSI'] = $WilayahModel->where('ID_JENIS', 1)->orderBy('DESKRIPSI', 'ASC')->findAll();
    
        echo view('master/wilayah', $data);
       
    }


    public function provinsi()
    {

        $WilayahModel = new WilayahModel();

        $provinsi = $WilayahModel->where('ID_JENIS', 1)->orderBy('DESKRIPSI', 'ASC')->findAll();

        $this->sukses('Berhasil mengambil data provinsi', $provinsi);
    }

    public function kabupaten()
    {

        $request = \Config\Services::request();
            
        $idprovinsi = $request->uri->getSegment(4);

        $WilayahModel = new WilayahModel();

        $kabupaten = $WilayahModel->where('ID_JENIS', 2)->like('ID', $idprovinsi, 'after')->orderBy('DESKRIPSI', 'ASC')->findAll();

        $this->sukses('Berhasil mengambil data kabupaten', $kabupaten);
    }

    public function kecamatan()
    {

        $request = \Config\Services::request();
            
        $idkabupaten = $request->uri->getSegment(4);

        $WilayahModel = new WilayahModel();

        $kecamatan = $WilayahModel->where('ID_JENIS', 3)->like('ID', $idkabupaten, 'after')->orderBy('DESKRIPSI', 'ASC')->findAll();

        $this->sukses('Berhasil mengambil data kecamatan', $kecamatan);
    }

    public function kelurahan()
    {

        $request = \Config\Services::request();
            
        $idkecamatan = $request->uri->getSegment(4);

        $WilayahModel = new WilayahModel();

        $kelurahan = $WilayahModel->where('ID_JENIS', 4)->like('ID', $idkecamatan, 'after')->orderBy('DESKRIPSI', 'ASC')->findAll();

        $this->sukses('Berhasil mengambil data keluarahan', $kelurahan);
    }





    private function getJenisWilayah($jenis=1)
    {
        switch($jenis) {
            case '2':
                return "Kab/Kota";
                break;
            case '3':
                return "Kecamatan";
                break;
            case '4':
                return "Kel/Desa";
                break;
            default: 
                return "Provinsi";

        }
    }

    public function simpan()
    {

            $wilayahModel = new WilayahModel();

            $data = [
                'ID'=>$this->request->getPost('ID'),
                'ID_JENIS'=>$this->request->getPost('ID_JENIS'),
                'DESKRIPSI'=>$this->request->getPost('DESKRIPSI'),
                'STATUS'=>$this->request->getPost('STATUS')
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $WilayahModel->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $WilayahModel->update($id, $data);
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
                $WilayahModel = new WilayahModel();
                $hapus = $WilayahModel->delete($id);

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
