<?php

namespace App\Controllers;

use App\Models\Modelorder_rad;
use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use PhpParser\Node\Stmt\GroupUse;

class Radiologi extends BaseController
{
    public function form_order()
    {
        $db = \Config\Database::connect();

        // if ($this->request->isAJAX()) {
        $nopen = $this->request->getVar('nopen');
        $row = DataTables::use('pendaftaran')
            ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran.STATUS as STATUS, pendaftaran.TGL_PENDAFTARAN as TGL_PENDAFTARAN, pendaftaran.JAM_PENDAFTARAN as JAM_PENDAFTARAN, m_pegawai.NAMA_PEGAWAI as DPJP, m_ruangan.RUANGAN as RUANGAN, m_penjamin.PENJAMIN as PENJAMIN, pendaftaran.CITO as CITO, pendaftaran.RESIKO_JATUH as RESIKO_JATUH, m_instalasi.INSTALASI as INSTALASI,  pendaftaran.ID_INSTALASI as IDINSTALASI, antrian_poli.ANTRIAN as NOANTRIAN, m_bed.NO_BED as BED, m_kamar.NAMA_KAMAR as KAMAR, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, m_ruangan.ID as IDRUANGAN')
            ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER')
            ->join('m_pegawai', 'pendaftaran.ID_DOKTER = m_pegawai.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_instalasi', 'pendaftaran.ID_INSTALASI = m_instalasi.ID', 'INNER')
            ->join('antrian_poli', 'pendaftaran.NOPEN = antrian_poli.NOPEN', 'LEFT')
            ->join('pendaftaran_ranap', 'pendaftaran.NOPEN = pendaftaran_ranap.NOPEN', 'LEFT')
            ->join('m_bed', 'pendaftaran_ranap.ID_BED = m_bed.ID', 'LEFT')
            ->join('m_kamar', 'm_bed.IDKAMAR = m_kamar.ID', 'LEFT')
            ->where(['pendaftaran_ranap.NOPEN' => $nopen])->make(true);
        $data = [
            'id' => $nopen,
            'data'  => $row
        ];

        return  view('detail_radiologi/modal_order_rad', $data);
    }

    function datatindakanradiologi()
    {
        return DataTables::use('m_tarif_rad')

            ->addColumn('NAMA_TINDAKAN', function ($data) {
                return "$data->NAMA_TINDAKAN";
            })


            ->addColumn('aksi', function ($data) {
                return "<button type=\"button\" onclick=\"addOrderRad(['" . $data->ID . "','" . $data->NAMA_TINDAKAN . "'])\"  data-backdrop=\"static\" class=\"btn btn-danger btn-mini waves-effect waves-light\"><i class=\"fas fa-plus-circle pull-right\"></i> Order</button>";
            })

            ->rawColumns(['aksi']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->make(true);
    }
}
