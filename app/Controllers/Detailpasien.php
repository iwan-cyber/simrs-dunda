<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use App\Models\Modelpendaftaran_ranap;


class Detailpasien extends BaseController
{


    public function bodyrekamedis()
    {
        if ($this->request->isAJAX()) {

            $nopen = $this->request->getVar('nopen');

            $row = DataTables::use('pendaftaran_ranap')
                ->select('pendaftaran_ranap.NOPEN as nopen, pendaftaran_ranap.NORM as norm, m_pasien.NAMA as nama, pendaftaran_ranap.STATUS as status')
                ->join('m_pasien', 'pendaftaran_ranap.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->where(['pendaftaran_ranap.NOPEN' => $nopen])->make(true);

            $data = [
                'id' => $nopen,
                'data'  => $row
            ];

            echo view('detail_anamnesis/body_anamnesis', $data);
        }
    }

    public function body_laboratorium()
    {
        if ($this->request->isAJAX()) {
            return view('detail_laboratorium/body_laboratorium');
        }
    }

    public function body_radiologi()
    {
        if ($this->request->isAJAX()) {
            return view('detail_radiologi/body_radiologi');
        }
    }


    public function body_utd()
    {
        if ($this->request->isAJAX()) {
            return view('detail_utd/body_utd');
        }
    }

    public function body_ok()
    {
        if ($this->request->isAJAX()) {
            return view('detail_ok/body_ok');
        }
    }

    public function body_mutasi()
    {
        if ($this->request->isAJAX()) {
            return view('detail_mutasi/body_mutasi');
        }
    }

    public function body_riwayat()
    {
        if ($this->request->isAJAX()) {
            return view('detail_riwayat/body_riwayat');
        }
    }
}
