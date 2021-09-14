<?php

namespace App\Controllers\Master;

use App\Models\Master\UserModel;

class User extends \App\Controllers\BaseController
{

    public function index()
    {

        echo view('master/user');
        
    }

    public function data() 
    {

        $user = new UserModel();

        //var_dump($user->getAll());
            
        $start = (int) $this->request->getPost('start');
        $length = (int) $this->request->getPost('length');

        
        $data = $user->findAll();
        
        foreach ($data as $row)
        {
            $id = $row['id'];
            
            $edit = '<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_' . $id . '" 
                        onclick="edit(' . $id . ')"
                        data-user=\'' . json_encode($row) . '\'>
                         <i class="ti-pencil"></i>   
                    </button>&nbsp;';

            $hapus = '<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_' . $id . '" 
                        onclick="konfirmasi_hapus(' . $id . ')">
                            
                            <i class="ti-close"></i>
                    </button>';


            $tombol = '<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">'.$edit.$hapus.'</div>';
                    

            $aktif = ($row['active']) ? 'checked': '';
            $check_aktif = '<input type="checkbox" name="active" id="active_'.$id.'" onchange="aktif('.$id.')" '.$aktif.'>';



            $list[] = [
                $row['id'],
                $row['username'],
                $row['fullname'],
                $row['email'],
                $check_aktif,
                $tombol
         ];

        }
        
        $json_data = array(
                "draw"            => intval($this->request->getPost('draw')),
                "recordsTotal"    => intval($length),
                "recordsFiltered" => intval($length),
                "data"            => $list
        );
        
        

        $this->response->setJSON($json_data);
        $this->response->send();
    }

    public function simpan()
    {

            $user = new UserModel();

            $data = [
                'username'=>$this->request->getPost('username'),
                'email'=>$this->request->getPost('email'),
                'fullname'=>$this->request->getPost('fullname'),
            ];

            if(empty($this->request->getPost('ID')))
            {
                $proses = $user->insert($data);
            }
            else
            {
                $id = $this->request->getPost('ID');
                $proses = $user->update($id, $data);
            }


            if($proses)
                $this->sukses('berhasil menyimpan data', $proses);
            else
                $this->gagal('Tidak berhasil menyimpand data', $proses);

    }    

    public function aktif()
    {

            $user = new UserModel();

            $data = [
                'active'=>$this->request->getPost('aktif'),
            ];

            
            $id = $this->request->getPost('ID');
            $proses = $user->update($id, $data);

            if($proses)
                $this->sukses('status user di berhasil di rubah', $proses);
            else
                $this->gagal('tidak berhasil di memperbaharui status aktif user', $proses);

    }

    public function hapus()
    {
        if($this->request->isAJAX())
        {

            $request = \Config\Services::request();
            
            $id = $request->uri->getSegment(4);

            if( ! empty($id))
            {
                $user = new UserModel();
                $hapus = $user->delete($id);

                if($hapus)
                    $this->sukses('Berhasil menghapus Item', $hapus);

                else
                    $this->gagal('Tidak berhasil menghapus item', $hapus);
            }
            else
            {
                $this->gagal('ID Hapus tidak di kirim', $id);
            }
        }
    }

    public function sukses($pesan='', $data=[])
    {
        $data = [
            'RESULT'=>true,
            'PESAN'=>$pesan,
            'DATA'=>$data
        ];

        $this->response->setJSON($data);
        $this->response->send();
    }    

    public function gagal($pesan='', $data=[])
    {
        $data = [
            'RESULT'=>false,
            'PESAN'=>$pesan,
            'DATA'=>$data
        ];

        $this->response->setJSON($data);
        $this->response->send();
    }
}
