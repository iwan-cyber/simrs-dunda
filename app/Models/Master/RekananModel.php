<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class RekananModel extends Model
{


    protected $table = 'm_p';
    protected $primaryKey = 'ID_REKANAN';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'REKANAN',
        'JENIS',
        'ALAMAT'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_rekanan r');       

        if(!empty($cari)) {
            $builder->like('REKANAN', $cari);
        }

        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
