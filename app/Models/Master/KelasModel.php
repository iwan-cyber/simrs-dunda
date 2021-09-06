<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class KelasModel extends Model
{


    protected $table = 'm_kelas';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KELAS',
    ];

}
