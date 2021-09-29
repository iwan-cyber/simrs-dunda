<?php

namespace App\Models\Master\Lab;

use CodeIgniter\Model;

class UjiTesModel extends Model
{


    protected $table = 'm_uji_tes';
    protected $primaryKey = 'id_uji';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'uji_tes',
        'satuan',
        'nilai_normal'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_uji_tes u');
        $builder->select('u.id_uji, u.uji_tes, u.urutan, u.satuan, u.nilai_normal, mku.nama_kelompok, mut.nama_sub, u.id_kelompok, u.id_sub');
        $builder->join('m_kelompok_uji mku', 'mku.id_kelompok = u.id_kelompok');
        $builder->join('m_sub_kelompok mut', 'mut.id_sub = u.id_sub');


        if(!empty($cari)) {
            $builder->like('uji_tes', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
