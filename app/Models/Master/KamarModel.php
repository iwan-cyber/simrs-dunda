<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class KamarModel extends Model
{


    protected $table = 'm_kamar';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE',
        'NAMA_KAMAR',
        'ID_RUANGAN',
        'IDKELAS',
        'STATUS'
    ];

    public function get($id_ruangan='')
    {
        return $this->db->table('m_kamar')
        ->select('m_kamar.ID, m_kamar.KODE, m_kamar.NAMA_KAMAR, m_kelas.KELAS')
         ->join('m_kelas', 'm_kelas.ID = m_kamar.IDKELAS', 'INNER JOIN')
         ->where('m_kamar.ID_RUANGAN', $id_ruangan)
         ->get()->getResultArray();  
    }

}
