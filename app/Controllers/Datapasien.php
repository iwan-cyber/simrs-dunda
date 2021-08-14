<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;

class Datapasien extends BaseController
{
    public function daftarRajal()
    { {
            $data = [
                'title'         => 'Data Pasien',
                'subtitle'      => 'Pendaftaran Pasien Rawat Jalan',
                'isi'           => 'pendaftaran/v_dataPasien.php',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function daftarUgd()
    { {
            $data = [
                'title'         => 'Data Pasien',
                'subtitle'      => 'Pendaftaran Pasien Gawat Darurat (UGD)',
                'isi'           => 'pendaftaran/v_dataPasien.php',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function daftarInap()
    { {
            $data = [
                'title'         => 'Data Pasien',
                'subtitle'      => 'Pendaftaran Pasien Rawat Inap',
                'isi'           => 'pendaftaran/v_dataPasien.php',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function TampilPasien()
    {
        return DataTables::use('m_pasien')

            ->addColumn('NOMR', function ($data) {
                return "$data->NOMR";
            })

            ->addColumn('NAMA', function ($data) {
                return "$data->NAMA";
            })

            ->addColumn('TGLLAHIR', function ($data) {
                return "$data->TGLLAHIR";
            })

            ->addColumn('JENISKELAMIN', function ($data) {
                if ($data->JENISKELAMIN == "l") {
                    return "Laki-laki";
                } else {
                    return "Perempuan";
                }
            })

            ->addColumn('NIP', function ($data) {
                return "$data->NIP";
            })

            ->addColumn('ALAMAT', function ($data) {
                return "$data->ALAMAT";
            })

            ->addColumn('aksi', function ($data) {
                return "<div class=\"btn-group\" role=\"group\" data-backdrop=\"static\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\".btn-xlg\">

                <button type=\"button\" class=\"btn btn-primary btn-mini waves-effect waves-light btn-ubah\" onclick=\"ubahData('" . $data->id . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\"><i class=\"ti-pencil-alt\"></i> Ubah </button>

                <button type=\"button\" class=\"btn btn-primary btn-mini waves-effect waves-light btn-ubah\" onclick=\"daftarPasien('" . $data->id . "')\" data-toggle=\"modal\" data-target=\"#GSCCModal\"><i class=\"ti-wheelchair\"></i> Daftar </button>

                <button type=\"button\" onclick=\"detailPasien('" . $data->id . "')\"  data-backdrop=\"static\" class=\"btn btn-info btn-mini waves-effect waves-light\"><i class=\"ti-user\"></i> Detail</button>

            </div>";
            })

            ->rawColumns(['aksi']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->make(true);
    }

    public function pasienserach()
    {
        return DataTables::use('m_pasien')

            ->addColumn('NAMA', function ($data) {
                return "<button type=\"button\" onclick=\"tabsambildetail('" . $data->NOMR . "')\"  class=\"btn btn-info btn-block btn-mini waves-effect waves-light text-left\"><i class=\"ti-user\"></i>" . $data->NAMA . " - " . $data->NOMR . "</button>";
            })
            ->rawColumns(['NAMA']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->make(true);
    }
}
