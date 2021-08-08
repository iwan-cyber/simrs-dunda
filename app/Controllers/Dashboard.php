<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use App\Models\Modelpendaftaran;
use App\Models\Modelpendaftaran_bpjs;
use App\Models\Modelpendaftaran_non_bpjs;
use App\Models\Modelpendaftaran_rujukan;
use CodeIgniter\Database\Query;


class Dashboard extends BaseController
{
    public function listrawatjalan()
    {
        if ($this->request->isAJAX()) {

            $pendaftaran = $this->db->table('pendaftaran')
                ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran.STATUS as STATUS, m_pasien.NOMR, pendaftaran.TGL_PENDAFTARAN as TGL_PENDAFTARAN, m_pegawai.NAMA_PEGAWAI as DPJP, m_ruangan.RUANGAN as TUJUAN, m_penjamin.PENJAMIN as PENJAMIN, pendaftaran.CITO as CITO, pendaftaran.RESIKO_JATUH as RESIKO_JATUH')
                ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->join('m_pegawai', 'pendaftaran.ID_DOKTER = m_pegawai.ID', 'INNER JOIN')
                ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER JOIN')
                ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER JOIN')

                ->where('pendaftaran.STATUS', 2)
                ->get();
            // ->where('IDINSTALASI', $instalasi)->get();
            // $pendaftaran = new Modelpendaftaran();

            if ($pendaftaran->getNumRows() > 0) {

                $isidata = "";
                foreach ($pendaftaran->getResultArray() as $row) :
                    if ($row['CITO'] == 'Y') {
                        $cito = '<label class="label label-danger">Ya</label>';
                    } else {
                        $cito = '<label class="label label-success">Tidak</label>';
                    }

                    if ($row['RESIKO_JATUH'] == 'Y') {
                        $resiko = '<label class="label label-danger">Ya</label>';
                    } else {
                        $resiko = '<label class="label label-success">Tidak</label>';
                    }

                    $isidata .= "<li>
                                    <table style=\"width: 100%;\">
                                    <tr>
                                        <td>
                                            <h6><label class=\"label label-info\">" . $row['NOPEN'] . "</label></h6>
                                        </td>
                                        <td style=\"text-align: right; text-align: right;\">
                                                <button type=\"button\" onclick=\"PanggilPasien('" . $row['NOPEN'] . "')\" class=\"btn btn-block btn-mini btn-primary btn-sm waves-effect waves-light btn-out-dashed\" data-toggle=\"tooltip\" title=\"Panggila pasien\"><i class=\"ti-hand-open\"></i> PANGGIL</button>
                                        </td>
                                        <td>
                                            <button type=\"button\" class=\"btn btn-block btn-danger btn-mini btn-sm waves-effect waves-light btn-out-dashed\">BATAL</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=\"font-size: 12px;\">
                                            " . $row['NORM'] . ' - ' . $row['NAMA'] . "<br>
                                            Tujuan: <b>" . $row['TUJUAN'] . "</b> <br>
                                            DPJP: " . $row['DPJP'] . " <br>
                                            Penjamin: " . $row['PENJAMIN'] . " <br>
                                            SEP: - <br>
                                            Cito: " . $cito . " | Resiko Jatuh: " . $resiko . "
                                        </td>
                                        <td style=\"text-align: center;\" colspan=\"2\">
                                            <h5>Antrian</h5>
                                            <h2>001</h2>
                                        </td>
                                    </tr>
                                   
                                    </table>
                                </li>";
                endforeach;

                $msg = [
                    'data' => $isidata
                ];
                echo json_encode($msg);
            }
        }
    }
}
