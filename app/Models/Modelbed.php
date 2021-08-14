<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Modelbed extends Model
{
    // tabel pendaftaran
    protected $table = 'm_bed';
    protected $primaryKey = 'ID';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE_BED',
        'NO_BED',
        'IDKAMAR',
        'STATUS'
    ];
}
