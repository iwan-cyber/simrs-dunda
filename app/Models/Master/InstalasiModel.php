<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class InstalasiModel extends Model
{


    protected $table = 'm_instalasi';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE',
        'INSTALASI',
        'STATUS'
    ];

}
