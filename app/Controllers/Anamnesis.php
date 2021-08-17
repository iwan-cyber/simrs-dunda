<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use App\Models\Modelpendaftaran;
use App\Models\Modelpendaftaran_ranap;


class Anamnesis extends BaseController
{

    public function Anam_umum()
    {
        if ($this->request->isAJAX()) {
            return view('detail_anamnesis/anam_umum');
        }
    }
    public function final_layanan()
    {
        if ($this->request->isAJAX()) {
            $nopen = $this->request->getVar('nopen');

            $row = DataTables::use('pendaftaran_ranap')
                ->select('pendaftaran_ranap.NOPEN as nopen, pendaftaran_ranap.NORM as norm, m_pasien.NAMA as nama, pendaftaran_ranap.STATUS as status, m_pasien.NOMR')
                ->join('m_pasien', 'pendaftaran_ranap.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->where(['NOPEN' => $nopen])->make(true);
            $data = [
                'id' => $nopen,
                'data'  => $row
            ];
            echo view('detail_anamnesis/final_layanan', $data);
        }
    }
}
