<?php

namespace App\Models\Master\Farmasi;

use CodeIgniter\Model;

class ItemModel extends Model
{


    protected $table = 'm_item';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'id',
        'kode_item',
        'nama_item',
        'sat_besar',
        'sat_kecil',
        'frac',
        'jenis',
        'golongan',
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_item i');


        if(!empty($cari)) {
            $builder->like('nama_item', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
