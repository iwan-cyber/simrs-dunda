<?php

namespace App\Models\Farmasi\Penerimaan;

use CodeIgniter\Model;

class PenerimaanDetailTempModel extends Model
{


    protected $table = 't_penerimaan_detail_tmp';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'tanggal',
        'trans',
        'kode_item',
        'nama_item',
        'batch',
        'tgl_expire',
        'jumlah_unit',
        'kemasan',
        'harga_faktur',
        'isi',
        'masuk_stock',
        'sat_kecil',
        'total_harga',
        'harga_gudang',
        'diskon',
        'nilai_diskon',
        'ppn',
        'subtotal',
        'harga_jual',
        'id_stock',
    ];

}