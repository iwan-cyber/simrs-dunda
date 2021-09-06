<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PenjaminModel extends Model
{


    protected $table = 'm_penjamin';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'PENJAMIN',
        'STATUS'
    ];

}
