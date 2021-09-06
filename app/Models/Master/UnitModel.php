<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class UnitModel extends Model
{


    protected $table = 'm_unit_layanan';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NAMA_UNIT_LAYANAN',
        'IDINSTALASI',
        'STATUS'
    ];


    public function get($id_instalasi)
    {
        return $this->db->table('m_unit_layanan')
         ->where('IDINSTALASI', $id_instalasi)
         ->get()->getResultArray();  
    }


}
