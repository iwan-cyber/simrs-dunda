<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class ReferensiModel extends Model
{


    protected $table = 'm_referensi';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'REFERENSI',
    ];
}
