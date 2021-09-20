<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;


class Modelorder_rad extends Model
{

    // tabel order lab pk
    protected $table = 't_order_rad';
    protected $primaryKey = 'ID_ORDER';

    // menentukan field apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NO_ORDER',
        'NOPEN',
        'TGL_ORDER',
        'JAM_ORDER',
        'ID_PASIEN',
        'NORM',
        'KLINIS',
        'DOKTER_PENGIRIM',
        'ID_RUANGAN',
        'ID_TINDAKAN',
        'BIAYA',
        'KEPESERTAAN',
        'HASIL_RAD',
        'HASIL_TGL',
        'HASIL_JAM',
        'HASIL_FOTO',
        'HASIL_KESAN',
        'HASIL_EXPERTISI',
        'HASIL_DOK_PEMERIKSA',
        'STATUS',
        'ORDA',
        'ID_USER'
    ];
}
