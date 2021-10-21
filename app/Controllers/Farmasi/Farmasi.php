<?php

namespace App\Controllers\Farmasi;

class Farmasi extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('farmasi/dashboard');
       
    }
}
