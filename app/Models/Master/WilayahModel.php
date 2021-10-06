<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class WilayahModel extends Model
{


    protected $table = 'm_wilayah';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'ID_JENIS',
        'DESKRIPSI',
        'STATUS'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_wilayah w');


        if(!empty($cari)) {
            $builder->like('DESKRIPSI', $cari);
        }

        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }    


}
