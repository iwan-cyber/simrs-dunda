<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;


class Development extends BaseController
{
    public function formRekamMedis()
    {
        return view('developmen/form_rekam_medis');
    }
}
