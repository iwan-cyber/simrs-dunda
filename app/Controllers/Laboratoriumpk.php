<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;

class laboratoriumpk extends BaseController
{
    public function form_order()
    {
        if ($this->request->isAJAX()) {
            // $norm = $this->request->getVar('norm');
            return view('detail_laboratorium/modal_order_labpk');
        }
    }

    public function datakelompok()
    {
        if ($this->request->isAJAX()) {

            $dataKelompokLabPK = $this->db->table('m_kelompok_uji')->get();

            if ($dataKelompokLabPK->getNumRows() > 0) {

                $isidata = "";
                foreach ($dataKelompokLabPK->getResultArray() as $row) :

                    $isidata .= "<td><button class=\"btn waves-effect waves-light btn-linkedin btn-sm btn-tab-labpk-kelompok col-md bg-info\" onclick=\"return btnkelompoklabpk(" . $row['id_kelompok'] . ")\"><i class=\"far fa-folder-open\"></i> " . $row['nama_kelompok'] . "</button></td>";

                endforeach;

                echo $isidata;
            }
        }
    }
}
