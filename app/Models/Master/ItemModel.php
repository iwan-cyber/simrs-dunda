<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class ItemModel extends Model
{


    protected $table = 'm_item';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'ID',
        'KODE_ITEM',
        'NAMA_ITEM',
        'SAT_BESAR',
        'SAT_KECIL',
        'FRAC',
        'GOLONGAN',
        'AKTIF'
    ];

}
