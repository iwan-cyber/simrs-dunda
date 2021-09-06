<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;

class User extends BaseController
{
    public function index()
    { {
            // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data = [
                'title'         => user()->fullname,
                'subtitle'      => 'Selamat Datang',
                'isi'           => 'layout/v_home_user',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }


    public function register()
    {
        return view('auth/register');
    }
}
