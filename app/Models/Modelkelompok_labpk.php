<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class modal_order_labpk extends Model
{
    // tabel pendaftaran
    protected $table = 'm_kelompok_uji';
    protected $primaryKey = 'id_kelompok';

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'nama_kelompok',
        'kelompok_urut'
    ];
}
