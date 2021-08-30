<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class UserModel extends Model
{


    protected $table = 'users';
    protected $primaryKey = 'id';
    

    protected $returnType     = 'array';
    

    // menentukan file apa saja yang dapat diinsert atau diupdated
    protected $allowedFields = [
        'email',
        'username',
        'fullname',
        'active',
        'user_image',
    ];

}
