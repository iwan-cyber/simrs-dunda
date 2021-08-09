<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use App\Models\Modelpendaftaran;

class Services extends BaseController
{

    public function jsonKamar()
    {
        if ($this->request->isAJAX()) {
            // $caridata = $this->request->getGet('search');

            $instalasi = $this->db->table('m_instalasi')->get();
            $data = array();
            if ($instalasi->getNumRows() > 0) {

                foreach ($instalasi->getResultArray() as $row) {
                    $x['id'] = $row['ID'];
                    $x['text'] = $row['INSTALASI'];
                    $x['status'] = $row['STATUS'];
                    // array unit layanan
                    $x['nodes'] = array();

                    $unit = $this->db->table('m_unit_layanan')
                        ->where(['m_unit_layanan.IDINSTALASI' => $row['ID']])
                        ->get();
                    foreach ($unit->getResultArray() as $row) {
                        $y['id'] = $row['ID'];
                        $y['text'] = $row['NAMA_UNIT_LAYANAN'];

                        // array data ruangan dalam unit
                        $y['nodes'] = array();
                        $ruangan = $this->db->table('m_ruangan')
                            ->where(['m_ruangan.IDUNITLAYANAN' => $row['ID']])
                            ->get();
                        foreach ($ruangan->getResultArray() as $row) {
                            $r['id'] = $row['ID'];
                            $r['text'] = $row['RUANGAN'];

                            // array data kamar dalam ruangan
                            $r['nodes'] = array();
                            $kamar = $this->db->table('m_kamar')
                                ->where(['m_kamar.ID_RUANGAN' => $row['ID']])
                                ->get();
                            foreach ($kamar->getResultArray() as $row) {
                                $k['idkamar'] = $row['ID'];
                                $k['text'] = $row['NAMA_KAMAR'];

                                array_push($r['nodes'], $k);
                            }

                            array_push($y['nodes'], $r);
                        }


                        array_push($x['nodes'], $y);
                    }




                    array_push($data, $x);
                }
                // echo "<pre>";
                echo json_encode($data);
                // echo "</pre>";
                // d($data);
            }
        }
    }
}
