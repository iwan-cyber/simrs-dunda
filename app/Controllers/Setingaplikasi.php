<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;


class Setingaplikasi extends BaseController
{

    public function managemenUser()
    { {
            $data = [
                'title'         => 'Managemen User',
                'subtitle'      => 'Mengatur hak akses user',
                'isi'           => 'setingaplikasi/v_managemen_user',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function pengaturanumum()
    { {
            $data = [
                'title'         => 'Pengaturan Umum',
                'subtitle'      => 'Berfungsi untuk mengatur nama organisasi, logo, alamat dan lain-lain!',
                'isi'           => 'setingaplikasi/v_pengaturanUmum',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }
    public function ambilAntrianLoket()
    { {
            $data = [
                'title'         => 'Kios-K Cetak Antrian Loket',
                'subtitle'      => 'Layanan mandiri cetak antrian loket pasien rawat jalan!',
                'isi'           => 'setingaplikasi/v_kioskCetakAntrianLoket',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }

    public function BridgingEktp()
    { {
            $data = [
                'title'         => 'Bridging E-KTP',
                'subtitle'      => 'Mengatur Bridging E-KTP Dirjen Dukcapil RI',
                'isi'           => 'setingaplikasi/v_BridgingEktp',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }
}
