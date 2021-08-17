<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelantrian_poli extends Model
{
    // tabel pendaftaran
    protected $table = 'antrian_poli';
    protected $primaryKey = 'ID';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NOPEN',
        'ANTRIAN',
        'IDUNIT_LAYANAN',
        'ID_RUANGAN',
        'STATUS'
    ];
}
