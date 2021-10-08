<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class PpkModel extends Model
{


    protected $table = 'm_ppk';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'KODE_PPK',
        'NAMA_PPK'
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_ppk p');
        $builder->select('p.ID, p.KODE_PPK, p.JENIS, p.BPJS, p.NAMA_PPK, p.ALAMAT');


        if(!empty($cari)) {
            $builder->like('NAMA_PPK', $cari);
            $builder->orWhere('KODE_PPK', $cari);
            $builder->orWhere('BPJS', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
