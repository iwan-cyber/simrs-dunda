<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class NoBillModel extends Model
{


    protected $table = 'm_nobill';
    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'APOTIK',
        'LAB',
        'RAD',
        'KASIR',
        'FARMASI_IN',
        'FARMASI_OUT',
        'SURVEY',
        'UGD',
        'REKAPAN',
        'GUDANG_IN',
        'GUDANG_OUT',
        'FARMASI_OPNAME',
    ];

    public function get($type='') {
    
        $bill = $this->getNoBill($type);
        $this->updateBill($type);

        return $bill;
    }

    private function getNoBill($type)
    {
        $table = 'm_nobill';

        //ambil data bill
        $bill = $this->db
                ->table($table)
                ->select($type)
                ->get()
                ->getResultArray();

        return $bill[0][$type];

    }

    private function updateBill($type)
    {

        $table = 'm_nobill';
        $field = $type.'+1';

        //update data bill
        $updateBill = $this->db
                        ->table($table)
                        ->set($type, $field, false)
                        ->update();
    }


}
