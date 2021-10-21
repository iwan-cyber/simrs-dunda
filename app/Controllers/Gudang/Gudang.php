<?php

namespace App\Controllers\Gudang;

class Gudang extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('gudang/dashboard');
       
    }
}
