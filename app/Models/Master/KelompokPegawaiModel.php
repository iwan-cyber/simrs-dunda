<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class KelompokPegawaiModel extends Model
{


    protected $table = 'm_kelompok_pegawai';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NIK',
        'KELOMPOK_PEGAWAI',
    ];

}
