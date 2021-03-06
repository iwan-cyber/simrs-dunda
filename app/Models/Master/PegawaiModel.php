<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PegawaiModel extends Model
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

    public function get()
    {
        return $this->db->table('m_pegawai')
        ->select('m_pegawai.*, m_kelompok_pegawai.KELOMPOK_PEGAWAI')
         ->join('m_kelompok_pegawai', 'm_kelompok_pegawai.ID = m_pegawai.IDKELOMPOK_PEGAWAI', 'INNER JOIN')
         ->get()->getResultArray();  
    }


}
