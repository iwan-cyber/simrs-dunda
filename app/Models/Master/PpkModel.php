<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PpkModel extends Model
{


    protected $table = 'm_ppk';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE_PPK',
        'NAMA_PPK'
    ];

}
