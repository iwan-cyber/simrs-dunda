<?php

namespace App\Controllers\Apotik;

class Apotik extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('apotik/dashboard');
       
    }

}
