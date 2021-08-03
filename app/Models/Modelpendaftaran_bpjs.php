<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelpendaftaran_bpjs extends Model
{
    // tabel pendaftaran
    protected $table = 'pendaftaran_bpjs';
    protected $primaryKey = 'ID';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NOPEN',
        'NOMR',
        'NOKARTU',
        'ID_KELASHAK',
        'ID_JENISPESERTA',
        'NO_SEP',
        'NO_SKDP',
        'ID_PENJAMIN'
    ];
}
