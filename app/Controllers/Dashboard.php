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

    public function listpendaftaran()
    {
        if ($this->request->isAJAX()) {

            $pendaftaran = $this->db->table('pendaftaran') // ambil data pendaftaran dengan status sedang antri atau belum dilayani/belum diterima!!
                ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran.STATUS as STATUS, pendaftaran.TGL_PENDAFTARAN as TGL_PENDAFTARAN, pendaftaran.JAM_PENDAFTARAN as JAM_PENDAFTARAN, m_pegawai.NAMA_PEGAWAI as DPJP, m_ruangan.RUANGAN as RUANGAN, m_penjamin.PENJAMIN as PENJAMIN, pendaftaran.CITO as CITO, pendaftaran.RESIKO_JATUH as RESIKO_JATUH, m_instalasi.INSTALASI as INSTALASI,  pendaftaran.ID_INSTALASI as IDINSTALASI, antrian_poli.ANTRIAN as NOANTRIAN, m_bed.NO_BED as BED, m_kamar.NAMA_KAMAR as KAMAR')
                ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER')
                ->join('m_pegawai', 'pendaftaran.ID_DOKTER = m_pegawai.ID', 'INNER')
                ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
                ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
                ->join('m_instalasi', 'pendaftaran.ID_INSTALASI = m_instalasi.ID', 'INNER')
                ->join('antrian_poli', 'pendaftaran.NOPEN = antrian_poli.NOPEN', 'LEFT')
                ->join('pendaftaran_ranap', 'pendaftaran.NOPEN = pendaftaran_ranap.NOPEN', 'LEFT')
                ->join('m_bed', 'pendaftaran_ranap.ID_BED = m_bed.ID', 'LEFT')
                ->join('m_kamar', 'm_bed.IDKAMAR = m_kamar.ID', 'LEFT')
                ->where('pendaftaran.STATUS', 2)
                ->get();

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

                    if ($row['IDINSTALASI'] == 2 || $row['IDINSTALASI'] == 4) {
                        $isidata .= "<li>
                                    <table style=\"width: 100%;\">
                                    <tr>
                                        <td>
                                            <h6><label class=\"label label-info\">" . $row['NOPEN'] . "</label> <label class=\"label label-info\">" . $row['TGL_PENDAFTARAN'] . " | Pukul " . $row['JAM_PENDAFTARAN'] . "</label></h6>
                                        </td>
                                        <td style=\"text-align: right; text-align: right;\" colspan=\"2\">
                                                <button type=\"button\" onclick=\"return TerimaPasien(['" . $row['NOPEN'] . "','" . $row['NORM'] . "'])\" class=\"btn btn-block btn-mini btn-info btn-sm waves-effect waves-light btn-out-dashed\" data-toggle=\"tooltip\" title=\"Layani pasien\"><i class=\"ti-hand-open\"></i>TERIMA</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=\"font-size: 12px;\">
                                            " . $row['NORM'] . ' - ' . $row['NAMA'] . "<br>
                                            Tujuan: <b>" . $row['RUANGAN'] . "/" . $row['KAMAR'] . "</b> <br>
                                            DPJP: " . $row['DPJP'] . " <br>
                                            Penjamin: " . $row['PENJAMIN'] . " <br>
                                            SEP: - <br>
                                            Cito: " . $cito . " | Resiko Jatuh: " . $resiko . "
                                        </td>
                                        <td style=\"text-align: center;\" colspan=\"2\">
                                            <h5>BED</h5>
                                            <h2>" . $row['BED'] . "</h2>
                                        </td>
                                    </tr>
                                   
                                    </table>
                                </li>";
                    } else {
                        $isidata .= "<li>
                        <table style=\"width: 100%;\">
                        <tr>
                            <td>
                                <h6><label class=\"label label-primary\">" . $row['NOPEN'] . "</label> <label class=\"label label-primary\">" . $row['TGL_PENDAFTARAN'] . " | Pukul " . $row['JAM_PENDAFTARAN'] . "</label></h6>
                            </td>
                            <td style=\"text-align: right; text-align: right;\" colspan=\"2\">
                                    <button type=\"button\" onclick=\"return PanggilPasien(['" . $row['NOPEN'] . "','" . $row['NORM'] . "'])\" class=\"btn btn-block btn-mini btn-primary btn-sm waves-effect waves-light btn-out-dashed\" data-toggle=\"tooltip\" title=\"Layani pasien\"><i class=\"ti-hand-open\"></i>PANGGIL</button>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"font-size: 12px;\">
                                " . $row['NORM'] . ' - ' . $row['NAMA'] . "<br>
                                Tujuan: <b>" . $row['RUANGAN'] . "/" . $row['INSTALASI'] . "</b> <br>
                                DPJP: " . $row['DPJP'] . " <br>
                                Penjamin: " . $row['PENJAMIN'] . " <br>
                                SEP: - <br>
                                Cito: " . $cito . " | Resiko Jatuh: " . $resiko . "
                            </td>
                            <td style=\"text-align: center;\" colspan=\"2\">
                                <h5>Antrian</h5>
                                <h2>" . $row['NOANTRIAN'] . "</h2>
                            </td>
                        </tr>
                        </table>    
                    </li>";
                    }

                endforeach;

                $msg = [
                    'data' => $isidata
                ];
                echo json_encode($msg);
            }
        }
    }

    public function listPasienSedangInap()
    {
        if ($this->request->isAJAX()) {

            $pendaftaran = $this->db->table('pendaftaran_ranap')
                ->select('pendaftaran_ranap.NOPEN as NOPEN, pendaftaran_ranap.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran_ranap.STATUS as STATUS, m_pasien.NOMR, pendaftaran_ranap.TGL_PENDAFTARAN as TGL_PENDAFTARAN, pendaftaran_ranap.JAM_PENDAFTARAN as JAM_PENDAFTARAN, m_pegawai.NAMA_PEGAWAI as DPJP, m_ruangan.RUANGAN as RUANGAN, m_penjamin.PENJAMIN as PENJAMIN, pendaftaran_ranap.CITO as CITO, pendaftaran_ranap.RESIKO_JATUH as RESIKO_JATUH, m_instalasi.INSTALASI as INSTALASI,  pendaftaran_ranap.ID_INSTALASI as IDINSTALASI, m_kamar.NAMA_KAMAR as KAMAR, m_bed.NO_BED as BED')
                ->join('m_pasien', 'pendaftaran_ranap.NORM = m_pasien.NOMR', 'INNER')
                ->join('m_pegawai', 'pendaftaran_ranap.ID_DOKTER = m_pegawai.ID', 'INNER')
                ->join('m_ruangan', 'pendaftaran_ranap.ID_RUANGAN = m_ruangan.ID', 'INNER')
                ->join('m_bed', 'pendaftaran_ranap.ID_BED = m_bed.ID', 'INNER')
                ->join('m_kamar', 'm_bed.IDKAMAR = m_kamar.id', 'INNER')
                ->join('m_penjamin', 'pendaftaran_ranap.ID_PENJAMIN = m_penjamin.ID', 'INNER')
                ->join('m_instalasi', 'pendaftaran_ranap.ID_INSTALASI = m_instalasi.ID', 'INNER')
                ->where(['pendaftaran_ranap.status' => 1]) // pasien sedang inap
                ->get();

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
                                            <h6><label class=\"label label-info\">" . $row['NOPEN'] . "</label> <label class=\"label label-info\">" . $row['TGL_PENDAFTARAN'] . " | Pukul " . $row['JAM_PENDAFTARAN'] . "</label></h6>
                                        </td>
                                        <td style=\"text-align: right; text-align: right;\" colspan=\"2\">
                                                <button type=\"button\" onclick=\"return lihatDetail(['" . $row['NOPEN'] . "','" . $row['NORM'] . "'])\" class=\"btn btn-out waves-effect waves-light btn-danger btn-square btn-mini btn-blok\" data-toggle=\"tooltip\" title=\"Layani pasien\"><i class=\"ti-eye\"></i>Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=\"font-size: 12px;\">
                                            " . $row['NORM'] . ' - ' . $row['NAMA'] . "<br>
                                            Tujuan: <b>" . $row['RUANGAN'] . "/" . $row['KAMAR'] . "</b> <br>
                                            DPJP: " . $row['DPJP'] . " <br>
                                            Penjamin: " . $row['PENJAMIN'] . " <br>
                                            SEP: - <br>
                                            Cito: " . $cito . " | Resiko Jatuh: " . $resiko . "
                                        </td>
                                        <td style=\"text-align: center;\" colspan=\"2\">
                                            <h5>BED</h5>
                                            <h2>" . $row['BED'] . "</h2>
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

    public function listpasienpolilayani()
    {
        if ($this->request->isAJAX()) {

            return DataTables::use('pendaftaran')
                ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA')
                ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER')
                ->addColumn('NAMA', function ($data) {
                    return "<button type=\"button\" onclick=\"return tabsPanggilPasienPOli(['" . $data->NOPEN . "','" . $data->NORM . "'])\"  class=\"btn btn-info btn-block btn-sm waves-effect waves-light text-left\"><i class=\"fas fa-user-injured\"></i> " . $data->NAMA . " - " . $data->NORM . "</button>";
                })
                ->where(['pendaftaran.ID_INSTALASI' => 1]) // pasien sedang dilayani di poli
                ->rawColumns(['NAMA'])
                ->make(true);
        }
    }
}
