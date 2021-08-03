<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelpendaftaran_non_bpjs extends Model
{
    // tabel pendaftaran
    protected $table = 'pendaftaran_non_bpjs';
    protected $primaryKey = 'ID';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NOPEN',
        'NOMR',
        'NOKARTU',
        'NAMA_PENJAMIN',
        'ALAMAT_PENJAMIN',
        'TELP',
        'ID_PENJAMIN'
    ];
}
