<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use App\Models\Modelpendaftaran;
use mysqli;

class Services extends BaseController
{

    public function jsonKamar()
    {
        // if ($this->request->isAJAX()) {
        // $caridata = $this->request->getGet('search');

        $kamar = $this->db->table('m_instalasi')->get();
        $Data = array();
        if ($kamar->getNumRows() > 0) {
            $x = [];
            // $key = 0;
            foreach ($kamar->getResultArray() as $row) :
                $x['id'] = $row['ID'];
                $x['instalasi'] = $row['INSTALASI'];
                $x['status'] = $row['STATUS'];

                $x['m_unit_layanan'] = array();

                $unit = $this->db->table('m_unit_layanan')
                    ->select('m_unit_layanan.ID as IDUNIT, m_unit_layanan.NAMA_UNIT_LAYANAN as UNIT')
                    ->join('m_unit_layanan', 'm_instalasi.ID = m_unit_layanan.IDINSTALASI', 'INNER JOIN')
                    ->where(['m_unit_layanan.IDINSTALASI', $row['ID']])
                    ->get();

                $y = [];
                foreach ($unit->getResultArray() as $rowUnit) :
                    $y['id'] = $rowUnit['IDUNIT'];
                    $y['unit'] = $rowUnit['UNIT'];

                    array_push($x['m_unit_layanan'], $y);

                endforeach;
                array_push($Data, $x);
            endforeach;

            echo json_encode($Data);
        }
        // }
    }
}
