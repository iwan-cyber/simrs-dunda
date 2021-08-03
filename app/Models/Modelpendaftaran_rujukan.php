<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelpendaftaran_rujukan extends Model
{
    // tabel pendaftaran
    protected $table = 'pendaftaran_rujukan';
    protected $primaryKey = 'ID';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NOPEN',
        'NOMR',
        'NOBPJS',
        'ID_PPK',
        'NORUJUKAN',
        'TGL_RUJUKAN',
        'DOKTER',
        'SMF_DOKTER',
        'DIAGNOSA',
        'ID_IDC10'
    ];
}
