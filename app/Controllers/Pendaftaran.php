<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use App\Models\Modelpendaftaran;
use App\Models\Modelpendaftaran_bpjs;
use App\Models\Modelpendaftaran_non_bpjs;
use App\Models\Modelpendaftaran_rujukan;
use CodeIgniter\Database\Query;


class Pendaftaran extends BaseController
{

    public function formpendaftaran()
    {
        $db = \Config\Database::connect();

        if ($this->request->isAJAX()) {
            $idpasien = $this->request->getVar('idpasien');
            $row = DataTables::use('m_pasien')->where(['id' => $idpasien])->make(true);
            $data = [
                'id' => $idpasien,
                'data'  => $row,
            ];
            echo view('pendaftaran/v_modalpendaftaran', $data);
        } else {
            return view('error_page');
        }
    }

    public function infodatakamar()
    {
        if ($this->request->isAJAX()) {
            $idruangan = $this->request->getVar('ruangan');
            $row = DataTables::use('m_kamar')->where(['ID_RUANGAN' => $idruangan])
                ->select('m_kamar.ID as IDKAMAR, m_kamar.NAMA_KAMAR as KAMAR, m_kamar.ID_RUANGAN as ID_RUANGAN, m_bed.STATUS as STATUSKAMAR, m_kelas.KELAS as KELAS,  m_kamar.KODE as KD_KAMAR, m_ruangan.RUANGAN as RUANGAN, m_kelas.TARIF_INAP as TARIF_INAP, m_bed.KODE_BED as KODE_BED, m_bed.NO_BED as NOBED, m_bed.ID as IDBED')
                ->join('m_kelas', 'm_kelas.ID=m_kamar.IDKELAS')
                ->join('m_ruangan', 'm_ruangan.ID=m_kamar.ID_RUANGAN')
                ->join('m_bed', 'm_bed.IDKAMAR=m_kamar.ID')
                ->make(true);
            $data = [
                'id' => $idruangan,
                'data'  => $row,
            ];
            // d($data);
            echo view('pendaftaran/v_modalinfokamar', $data);
            // echo json_encode($msg);
        } else {
            return view('error_page');
        }
    }


    public function simpanPendaftaran()
    {
        if ($this->request->isAJAX()) { {

                $simpanPendaftaran = [
                    'NOPEN' => $this->request->getPost('nopen'),
                    'ID_PASIEN' => $this->request->getPost('idpasien'),
                    'NORM' => $this->request->getPost('nomr'),
                    'CITO' => $this->request->getPost('cito'),
                    'RESIKO_JATUH' => $this->request->getPost('resikojatuh'),
                    'TGL_PENDAFTARAN' => $this->request->getPost('tglpendaftaran'),
                    'JAM_PENDAFTARAN' => $this->request->getPost('jampendaftran'),
                    'ID_INSTALASI' => $this->request->getPost('instalasi'),
                    'ID_UNITLAYANAN' => $this->request->getPost('unitlayanan'),
                    'ID_RUANGAN' => $this->request->getPost('ruangan'),
                    'ID_SMF' => $this->request->getPost('smf'),
                    'ID_DOKTER' => $this->request->getPost('dokterlayanan'),
                    'ID_PAKET' => $this->request->getPost('tarif'),
                    'ID_PENJAMIN' => $this->request->getPost('penjamin'),
                    'PJ_KATEGORI' => $this->request->getPost('pjkategori'),
                    'PJ_HUBUNGAN' => $this->request->getPost('pjhubungan'),
                    'PJ_KELAMIN' => $this->request->getPost('pjjenkel'),
                    'PJ_KERJAAN' => $this->request->getPost('pjpekerjaan'),
                    'PJ_PENDIDIKAN' => $this->request->getPost('pjpendidikan'),
                    'PJ_ALAMAT' => $this->request->getPost('pjalamat'),
                    'PJ_NOTELP' => $this->request->getPost('pjtelp')
                ];

                $tPendaftaran = new Modelpendaftaran;
                $tPendaftaran->insert($simpanPendaftaran);


                $penjamin = $this->request->getVar('penjamin');
                $rujukan = $this->request->getVar('rujukan_ppk');

                if ($rujukan != "") { // jika pasien rujukan maka simpan tabel rujukan
                    $simpanRujukan = [
                        'NOPEN' => $this->request->getPost('nopen'),
                        'NOMR' => $this->request->getPost('nomr'),
                        'NOBPJS' => $this->request->getPost('bpjs_nokartu'),
                        'ID_PPK' => $this->request->getPost('rujukan_ppk'),
                        'NORUJUKAN' => $this->request->getPost('rujukan_nomor'),
                        'TGL_RUJUKAN' => $this->request->getPost('rujukan_tanggal'),
                        'DOKTER' => $this->request->getPost('rujukan_dokter'),
                        'SMF_DOKTER' => $this->request->getPost('rujukan_smf'),
                        'DIAGNOSA' => $this->request->getPost('rujukan_diagnosa'),
                        'ID_IDC10' => $this->request->getPost('rujukan_icd')
                    ];

                    $tPenRujukan = new Modelpendaftaran_rujukan;
                    $tPenRujukan->insert($simpanRujukan);
                }

                if ($penjamin != 2) { // bukan bpjs
                    $simpanNonBpjs = [
                        'NOPEN' => $this->request->getPost('nopen'),
                        'NOMR' => $this->request->getPost('nomr'),
                        'NOKARTU' => $this->request->getPost('umum_nomor'),
                        'NAMA_PENJAMIN' => $this->request->getPost('umum_nama'),
                        'ALAMAT_PENJAMIN' => $this->request->getPost('umum_alamat'),
                        'TELP' => $this->request->getPost('umum_telp'),
                        'ID_PENJAMIN' => $this->request->getPost('penjamin')
                    ];

                    $tPenNonBpjs = new Modelpendaftaran_non_bpjs;
                    $tPenNonBpjs->insert($simpanNonBpjs);
                } else {
                    $simpanPenBpjs = [
                        'NOPEN' => $this->request->getPost('nopen'),
                        'NOMR' => $this->request->getPost('nomr'),
                        'NOKARTU' => $this->request->getPost('bpjs_nokartu'),
                        'ID_KELASHAK' => $this->request->getPost('bpjs_kelashak'),
                        'ID_JENISPESERTA' => $this->request->getPost('bpjs_jenis'),
                        'NO_SEP' => $this->request->getPost('bpjs_sep'),
                        'NO_SKDP' => $this->request->getPost('bpjs_skdp'),
                        'ID_PENJAMIN' => $this->request->getPost('penjamin')
                    ];

                    $tPenBpjs = new Modelpendaftaran_bpjs;
                    $tPenBpjs->insert($simpanPenBpjs);
                }



                // $tPendaftaran = new Modelpendaftaran->rujukan;
                // $tPendaftaran->insert($simpanPendaftaran);

                $msg = [
                    'sukses' => 'Pendaftaran berhasil dilakukan!'
                ];
                echo json_encode($msg);
            }
        } else {
            return view('error_page');
        }
    }
}
