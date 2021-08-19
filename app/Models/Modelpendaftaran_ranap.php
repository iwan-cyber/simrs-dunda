<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelpendaftaran_ranap extends Model
{


    // tabel pendaftaran
    protected $table = 'pendaftaran_ranap';
    protected $primaryKey = 'NOPEN';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NOPEN',
        'KODE_BOOKING',
        'ID_PASIEN',
        'NORM',
        'CITO',
        'RESIKO_JATUH',
        'TGL_PENDAFTARAN',
        'JAM_PENDAFTARAN',
        'ID_INSTALASI',
        'ID_UNITLAYANAN',
        'ID_RUANGAN',
        'ID_BED',
        'ID_SMF',
        'ID_DOKTER',
        'ID_PAKET',
        'ID_PENJAMIN',
        'PJ_KATEGORI',
        'PJ_HUBUNGAN',
        'PJ_KELAMIN',
        'PJ_KELAMIN',
        'PJ_KERJAAN',
        'PJ_PENDIDIKAN',
        'PJ_ALAMAT',
        'PJ_NOTELP',
        'STATUS',
        'JAM_STATUS',
        'TGL_STATUS',
        'STATUS_FINAL',
        'JAM_STATUS_FINAL',
        'TGL_STATUS_FINAL',
        'USER_SESSION'
    ];
}
