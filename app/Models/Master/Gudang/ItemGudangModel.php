<?php

namespace App\Models\Master\Gudang;

use CodeIgniter\Model;

class ItemGudangModel extends Model
{


    protected $table = 'm_item_gudang';
    protected $primaryKey = 'kode_item';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'kode_item',
        'nama_item',
        'satuan',
        'jenis',
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_item_gudang i');


        if(!empty($cari)) {
            $builder->like('nama_item', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
