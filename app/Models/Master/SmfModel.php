<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class SmfModel extends Model
{


    protected $table = 'm_smf';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'SMF',
    ];

}
