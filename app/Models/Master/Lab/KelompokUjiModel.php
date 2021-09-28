<?php

namespace App\Models\Master\Lab;

use CodeIgniter\Model;

class KelompokUjiModel extends Model
{


    protected $table = 'm_kelompok_uji';
    protected $primaryKey = 'id_kelompok';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'nama_kelompok',
        'kelompok_urut'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_kelompok_uji p');
        $builder->select('p.id_kelompok, p.nama_kelompok, p.kelompok_urut');


        if(!empty($cari)) {
            $builder->like('nama_kelompok', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
