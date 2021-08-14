<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use App\Models\Modelpendaftaran;
use App\Models\Modelpendaftaran_ranap;

class Rekammedis extends BaseController
{

    public function cekPendaftaran()
    {
        $db = \Config\Database::connect(); {
            $data = [
                'title'         => 'Cek Pendaftran',
                'subtitle'      => 'Pilih Intalasi untuk melihat Informasi Pendaftaran',
                'isi'           => 'rekammedis/v_cek_pendaftaran',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function ambilDataPendaftaran()
    {
        if ($this->request->isAJAX()) {
            $statusLayanan = $this->request->getVar('status');

            if ($statusLayanan == "all") {
                return DataTables::use('pendaftaran')

                    ->select('pendaftaran.NOPEN as nopen, pendaftaran.NORM as norm, m_pasien.NAMA as nama, pendaftaran.STATUS as status, m_pasien.NOMR')
                    ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER JOIN')

                    ->addColumn('status', function ($data) {
                        if ($data->status == 1) {
                            return '<span class="label label-lg label-primary">Sedang Dilayani</span>';
                        } elseif ($data->status == 2) {
                            return '<span class="label label-lg label-info">Sedang Antri</span>';
                        } elseif ($data->status == 3) {
                            return '<span class="label label-lg label-success">Terlayani</span>';
                        } elseif ($data->status == 4) {
                            return '<span class="label label-lg label-danger">Tidak Terlayani</span>';
                        }
                    })

                    ->addColumn('action', function ($data) {
                        if ($data->status == 1) {

                            return "<div class=\"btn-group\" role=\"group\">
                    
                        <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                    </div>";
                        } elseif ($data->status == 2) {
                            return "<div class=\"btn-group\" role=\"group\">
                        <button type=\"button\" onclick=\"PanggilPasien('" . $data->NOMR . "')\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-inverse btn-square\" data-toggle=\"tooltip\" title=\"Panggila pasien\"><i class=\"ti-hand-open\"></i> Panggil</button>
    
                        <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                        </div>";
                        } elseif ($data->status == 3) {
                            return "<div class=\"btn-group\" role=\"group\">
                    
                        <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                    </div>";
                        } elseif ($data->status == 4) {
                            return "<div class=\"btn-group\" role=\"group\">
                        <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                        
                    </div>";
                        }
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            } else {

                return DataTables::use('pendaftaran')

                    ->select('pendaftaran.NOPEN as nopen, pendaftaran.NORM as norm, m_pasien.NAMA as nama, pendaftaran.STATUS as status, m_pasien.NOMR')
                    ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER JOIN')

                    ->where(['pendaftaran.STATUS' => $statusLayanan])

                    ->addColumn('status', function ($data) {
                        if ($data->status == 1) {
                            return '<span class="label label-lg label-primary">Sedang Dilayani</span>';
                        } elseif ($data->status == 2) {
                            return '<span class="label label-lg label-info">Sedang Antri</span>';
                        } elseif ($data->status == 3) {
                            return '<span class="label label-lg label-success">Selesai Dilayani</span>';
                        } elseif ($data->status == 4) {
                            return '<span class="label label-lg label-danger">Tidak Terlayani</span>';
                        }
                    })

                    ->addColumn('action', function ($data) {
                        if ($data->status == 1) {
                            return "<div class=\"btn-group\" role=\"group\">
                    
                            <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
    
                        </div>";
                        } elseif ($data->status == 2) {
                            return "<div class=\"btn-group\" role=\"group\">
                            <button type=\"button\" onclick=\"PanggilPasien('" . $data->nopen . "')\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-inverse btn-square\" data-toggle=\"tooltip\" title=\"Panggila pasien\"><i class=\"ti-hand-open\"></i> Panggil</button>
        
                            <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                            
                            </div>";
                        } elseif ($data->status == 3) {
                            return "<div class=\"btn-group\" role=\"group\">
                        
                            <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
    
                        </div>";
                        } elseif ($data->status == 4) {
                            return "<div class=\"btn-group\" role=\"group\">
                        
                            <button type=\"button\" onclick=\"detailPasien('" . $data->NOMR . "')\" data-toggle=\"modal\" class=\"btn btn-out-dotted btn-mini waves-effect waves-light btn-primary btn-square\" title=\"Detail informasi dan riwayat pemeriksaan pasien\"><i class=\"ti-align-justify\"></i> Detail</button>
                            
                        </div>";
                        }
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
        }
    }

    public function ambildetailpasien()
    {
        if ($this->request->isAJAX()) {
            $nomr = $this->request->getVar('NOMR');

            $row = DataTables::use('m_pasien')->where(['NOMR' => $nomr])->make(true);

            $data = [
                'id' => $nomr,
                'data'  => $row,
            ];
            echo view('rekammedis/v_modal_detail_pasien', $data);
        }
    }

    public function penerimaanpasien()
    {
        if ($this->request->isAJAX()) {
            $nopen = $this->request->getVar('NOPEN');
            $jampel = $this->request->getVar('jampel');
            $tglpel = $this->request->getVar('tglpel');
            $sessionuser = $this->request->getVar('sessionUser');

            // ubah status diterima dan sedang dilayani
            $valStatus = "1";
            $updatedata = [
                'STATUS' => $valStatus,
                'JAM_STATUS' => $jampel,
                'TGL_STATUS' => $tglpel,
                'USER_USESSION' => $sessionuser,
            ];

            $pendaftaran = new Modelpendaftaran();
            $pendaftaran->update($nopen, $updatedata);

            $penRanapa = new Modelpendaftaran_ranap();
            $penRanapa->update($nopen, $updatedata);

            $row = DataTables::use('pendaftaran')
                ->select('pendaftaran.NOPEN as nopen, pendaftaran.NORM as norm, m_pasien.NAMA as nama, pendaftaran.STATUS as status, m_pasien.NOMR')
                ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->where(['NOPEN' => $nopen])->make(true);
            $data = [
                'id' => $nopen,
                'data'  => $row,
            ];
            echo view('rekammedis/detail_pasien', $data);
        }
    }

    public function batalkanPendaftaran()
    {
        if ($this->request->isAJAX()) {
            $nopen = $this->request->getVar('nopen');
            $jampel = $this->request->getVar('jampel');
            $tglpel = $this->request->getVar('tglpel');
            $sessionuser = $this->request->getVar('sessionUser');
            $valStatus = "4"; // status batal pelayanan / pasien tidak dilayani

            $updatedata = [
                'STATUS' => $valStatus,
                'JAM_STATUS' => $jampel,
                'TGL_STATUS' => $tglpel,
            ];

            // Panggila Modelblok
            $pendaftaran = new Modelpendaftaran();
            $pendaftaran->update($nopen, $updatedata);

            $msg = [
                'sukses' => 'Anda telah membatalkan kunjungan No. Pendaftaran '
            ];
            echo json_encode($msg);
        }
    }

    public function detailpasien()
    {
        if ($this->request->isAJAX()) {
            $nopen = $this->request->getVar('NOPEN');

            $row = DataTables::use('pendaftaran_ranap')
                ->select('pendaftaran_ranap.NOPEN as nopen, pendaftaran_ranap.NORM as norm, m_pasien.NAMA as nama, pendaftaran_ranap.STATUS as status, m_pasien.NOMR')
                ->join('m_pasien', 'pendaftaran_ranap.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->where(['NOPEN' => $nopen])->make(true);
            $data = [
                'id' => $nopen,
                'data'  => $row,
            ];
            echo view('rekammedis/detail_pasien', $data);
        }
    }

    public function finallayanan()
    {
        if ($this->request->isAJAX()) {

            $nopen = $this->request->getVar('nopen');
            $statusFinal = $this->request->getVar('statusFinal');
            $tglFinal = $this->request->getVar('tglFinal');
            $jamFinal = $this->request->getVar('jamFinal');
            $sessionuser = $this->request->getVar('sessionUser');
            $valStatus = "3"; //final layanan / selesai

            $updatedata = [
                'STATUS' => $valStatus,
                'STATUS_FINAL' => $statusFinal,
                'TGL_STATUS_FINAL' => $tglFinal,
                'JAM_STATUS_FINAL' => $jamFinal,
            ];
            $pendaftaran = new Modelpendaftaran();
            $pendaftaran->update($nopen, $updatedata);

            $msg = [
                'sukses' => 'Sukses'
            ];
            echo json_encode($msg);
        }
    }
}
