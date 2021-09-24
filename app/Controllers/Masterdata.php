<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;


class Masterdata extends BaseController
{

    public function AmbilInstalasi()
    {
        if ($this->request->isAJAX()) {
            $caridata = $this->request->getGet('search');

            $instalasi = $this->db->table('m_instalasi')->LIKE('INSTALASI', $caridata)->get();

            if ($instalasi->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($instalasi->getResultArray() as $row) :
                    $list[$key]['id'] = $row['ID'];
                    $list[$key]['text'] = $row['INSTALASI'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }

    public function AmbilPPK()
    {
        if ($this->request->isAJAX()) {
            $kdPPKbpjs = $this->request->getVar('search');

            $dataPPK = $this->db->table('m_ppk')->LIKE('BPJS', $kdPPKbpjs)->get();

            $isidata = "";
            foreach ($dataPPK->getResultArray() as $row) :

                $isidata .= '<option value="' . $row['ID'] . '">' . $row['NAMA_PPK'] . '</option>';

            endforeach;

            $msg = [
                'data' => $isidata
            ];

            echo json_encode($msg);
        }
    }

    public function AmbilSmf()
    {
        if ($this->request->isAJAX()) {
            $caridata = $this->request->getGet('search');

            $smf = $this->db->table('m_smf')->LIKE('SMF', $caridata)->get();

            if ($smf->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($smf->getResultArray() as $row) :
                    $list[$key]['id'] = $row['ID'];
                    $list[$key]['text'] = $row['SMF'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }

    public function AmbilUnitLayanan()
    {
        if ($this->request->isAJAX()) {
            $instalasi = $this->request->getVar('instalasi');

            $dataUnitLayanan = $this->db->table('m_unit_layanan')->where('IDINSTALASI', $instalasi)->get();

            if ($dataUnitLayanan->getNumRows() > 0) {

                $isidata = "";
                $isidata .= "<option>[ Pilih Unit Layanan ]</option>";
                foreach ($dataUnitLayanan->getResultArray() as $row) :

                    $isidata .= '<option value="' . $row['ID'] . '">' . $row['NAMA_UNIT_LAYANAN'] . '</option>';

                endforeach;

                $msg = [
                    'data' => $isidata
                ];

                echo json_encode($msg);
            }
        }
    }

    public function AmbilRuangan()
    {
        if ($this->request->isAJAX()) {
            $unitlayanan = $this->request->getVar('unitlayanan');

            $DataRuangan = $this->db->table('m_ruangan')->where('IDUNITLAYANAN', $unitlayanan)->get();

            if ($DataRuangan->getNumRows() > 0) {

                $isidata = "";
                $isidata .= "<option>[ Pilih Unit Ruangan ]</option>";

                foreach ($DataRuangan->getResultArray() as $row) :

                    $isidata .= '<option value="' . $row['ID'] . '">' . $row['RUANGAN'] . '</option>';

                endforeach;

                $msg = [
                    'data' => $isidata
                ];

                echo json_encode($msg);
            }
        }
    }

    public function AmbilDokterLayanan()
    {
        if ($this->request->isAJAX()) {
            $smf = $this->request->getVar('smf');
            $DataDokterLayanan = $this->db->table('m_pegawai')
                ->where('ID_SMF', $smf)
                ->get();

            if ($DataDokterLayanan->getNumRows() > 0) {
                $isidata = "";
                $isidata .= "<option>[ Pilih Dokter ]</option>";
                foreach ($DataDokterLayanan->getResultArray() as $row) :

                    $isidata .= '<option value="' . $row['ID'] . '">' . $row['NAMA_PEGAWAI'] . '</option>';

                endforeach;

                $msg = [
                    'data' => $isidata
                ];

                echo json_encode($msg);
            }
        }
    }

    public function AmbilTarif()
    {
        if ($this->request->isAJAX()) {
            $tarif = $this->request->getGet('search');

            $datatarif = $this->db->table('m_paket_layanan')->LIKE('NAMA_PAKET', $tarif)->get();

            if ($datatarif->getNumRows() > 0) {
                $list = [];
                $key = 0;

                foreach ($datatarif->getResultArray() as $row) :
                    $list[$key]['id'] = $row['ID'];
                    $list[$key]['text'] = 'Rp. ' . $row['TARIF'] . ' - ' . $row['NAMA_PAKET'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }


    public function GetDokterOrder()
    {
        if ($this->request->isAJAX()) {
            $caridata = $this->request->getGet('search');

            $instalasi = $this->db->table('m_pegawai')->LIKE('NAMA_PEGAWAI', $caridata)->get();

            if ($instalasi->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($instalasi->getResultArray() as $row) :
                    $list[$key]['id'] = $row['ID'];
                    $list[$key]['text'] = $row['NAMA_PEGAWAI'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }
}
