<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class RuanganModel extends Model
{


    protected $table = 'm_ruangan';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'RUANGAN',
        'IDUNITLAYANAN',
        'STATUS'
    ];

    public function getAll()
    {
       return $this->db->table('m_ruangan')
         ->select('m_ruangan.ID, m_ruangan.RUANGAN, m_unit_layanan.NAMA_UNIT_LAYANAN')
         ->join('m_unit_layanan', 'm_unit_layanan.ID = m_ruangan.IDUNITLAYANAN', 'INNER JOIN')
         ->get()->getResult();  
    }



}
