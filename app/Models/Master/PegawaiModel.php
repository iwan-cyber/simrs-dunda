<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PegawaiModel extends Model
{


    protected $table = 'm_pegawai';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NIK',
        'NAMA_PEGAWAI',
        'JENKEL',
        'NIP',
        'STATUS_KEPEGAWAIAN',
        'IDKELOMPOK_PEGAWAI',
        'STATUS',
    ];

}
