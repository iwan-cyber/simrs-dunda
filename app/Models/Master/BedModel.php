<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class BedModel extends Model
{


    protected $table = 'm_bed';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE_BED',
        'NO_BED',
        'IDKAMAR',
        'STATUS'
    ];

    public function get($id_kamar='')
    {
       return $this->db->table('m_bed')
         ->where('IDKAMAR',$id_kamar)
         ->get()->getResult();  
    }


}
