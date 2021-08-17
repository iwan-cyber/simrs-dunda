<?php

namespace App\Controllers;

class Dev extends BaseController
{
    public function index()
    { {
            // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data = [
                'title'         => 'Detail Pasien',
                'subtitle'      => 'Detail Pasien',
                'isi'           => 'developmen/dev_detail_pasien',
            ];
        }
        echo view('layout/v_wrapper', $data);
    }


    public function register()
    {
        return view('auth/register');
    }
}
