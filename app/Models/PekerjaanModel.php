<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{


    // tabel pendaftaran
    protected $table = 'm_pekerjaan';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'PEKERJAAN'
    ];
}
