<?php

namespace App\Models\Farmasi\Penerimaan;

use CodeIgniter\Model;

class PenerimaanModel extends Model
{


    protected $table = 't_penerimaan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'nomor',
        'rekanan',
        'faktur',
        'user',
        'trans',
        'tanggal',
        'posting',
        'tgl_faktur',
        'jenis',
        'subtotal',
        'potongan',
        'ppn',
        'tagihan',
        'jatuh_tempo',
        'kelompok',
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
