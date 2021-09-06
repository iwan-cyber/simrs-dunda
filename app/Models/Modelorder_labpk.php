<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelorder_labpk extends Model
{
    // tabel order lab pk
    protected $table = 't_order_labpk';
    protected $primaryKey = 'ID';

    // menentukan field apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NO_ORDER',
        'NOPEN',
        'TGL_ORDER',
        'JAM_ORDER',
        'IDPASIEN',
        'NORM',
        'DOKTER_PENGIRIM',
        'ID_RUANGAN',
        'ID_KELOMPOK',
        'ID_SUB',
        'ID_UJI',
        'ORDA',
        'STATUS_ORDER',
        'USER_PENGIRIM',
        'HASIL_LAB',
        'HASIL_TANGGAL',
        'HASIL_JAM'
    ];
}
