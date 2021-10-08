<?php

namespace App\Models\Master\Lab;

use CodeIgniter\Model;

class TindakanLabModel extends Model
{


    protected $table = 'm_tindakan_labpk';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'NAMA_TINDAKAN',
        'SATUAN',
        'NILAI_NORMAL',
        'IDKELAS_SETING',
    ];

    public function get($get) {

        $query = [];

        $length = (int) $get['length'];
        $start = (int) $get['start'];
        $cari = $get['search']['value'];

        $db      = \Config\Database::connect();
        $builder = $db->table('m_tindakan_labpk l');
        $builder->join('seting_tarif_labpk t', 'l.IDKELAS_SETING=t.ID');
        $builder->select('l.*, t.JASA_SARANA, t.JASA_PELAYANAN, t.JUMLAH, t.STATUS');

        if(!empty($cari)) {
            $builder->like('nama_tindakan', $cari);
        }

        
        $builder->limit($length, $start);

        $query['DATA']  = $builder->get()->getResultArray(); 
        $query['JUMLAH'] = $builder->countAllResults();
        
        return $query;

    }


}
