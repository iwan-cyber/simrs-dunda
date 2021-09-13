<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PegawaiProfesiModel extends Model
{


    protected $table = 'm_pegawai';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NIK',
        'NAMA_PEGAWAI',
        'JENKEL',
        'NIP',
        'STATUS_KEPEGAWAIAN',
        'IDKELOMPOK_PEGAWAI',
        'STATUS',
    ];

    public function get($kelompok='')
    {
        return $this->db->table('m_pegawai')
        ->select('m_pegawai.ID, m_pegawai.NAMA_PEGAWAI, m_pegawai.IDKELOMPOK_PEGAWAI, m_kelompok_pegawai.KELOMPOK_PEGAWAI')
         ->join('m_kelompok_pegawai', 'm_kelompok_pegawai.ID = m_pegawai.IDKELOMPOK_PEGAWAI', 'INNER JOIN')
         ->where('m_pegawai.IDKELOMPOK_PEGAWAI', $kelompok)
         ->get()->getResultArray();  
    }


}
