<?php

namespace App\Models\Master\Radiologi;

use CodeIgniter\Model;

class TarifRadModel extends Model
{


    protected $table = 'm_tarif_rad';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NAMA_TINDAKAN',
        '3',
        '2',
        '1',
        'VIP',
        'VVIP',
        'ICU',
        'BPJS',
        'BPJS_RI',
        'KATEGORI',
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_tarif_rad t');

        if(!empty($cari)) {
            $builder->like('NAMA_TINDAKAN', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
