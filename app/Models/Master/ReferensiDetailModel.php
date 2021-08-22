<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class ReferensiDetailModel extends Model
{


    protected $table = 'm_ref_detail';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'ref',
        'deskripsi',
    ];
}
