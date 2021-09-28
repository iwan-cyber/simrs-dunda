<?php

namespace App\Models\Master\Lab;

use CodeIgniter\Model;

class SubKelompokUjiModel extends Model
{


    protected $table = 'm_sub_kelompok';
    protected $primaryKey = 'id_sub';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'nama_sub',
        'id_kelompok'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_sub_kelompok p');
        $builder->select('p.id_sub, p.nama_sub, p.id_kelompok, p1.nama_kelompok');
        $builder->join('m_kelompok_uji p1', 'p1.id_kelompok = p.id_kelompok');


        if(!empty($cari)) {
            $builder->like('nama_sub', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
