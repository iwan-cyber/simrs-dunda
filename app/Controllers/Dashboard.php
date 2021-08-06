<?php

namespace App\Controllers;

use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use App\Models\Modelpendaftaran;
use App\Models\Modelpendaftaran_bpjs;
use App\Models\Modelpendaftaran_non_bpjs;
use App\Models\Modelpendaftaran_rujukan;
use CodeIgniter\Database\Query;


class Dashboard extends BaseController
{
    public function listrawatjalan()
    {
        if ($this->request->isAJAX()) {

            $pendaftaran = $this->db->table('pendaftaran')
                ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran.STATUS as STATUS, m_pasien.NOMR, pendaftaran.TGL_PENDAFTARAN as TGL_PENDAFTARAN')
                ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER JOIN')
                ->where('pendaftaran.STATUS', 2)
                ->get();
            // ->where('IDINSTALASI', $instalasi)->get();
            // $pendaftaran = new Modelpendaftaran();

            if ($pendaftaran->getNumRows() > 0) {

                $isidata = "";
                foreach ($pendaftaran->getResultArray() as $row) :

                    $isidata .= '<li>
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="width: 50%; font-weight: bold;">
                                                <h6>' . $row['NORM'] . '<br>' . $row['NAMA'] . '</h6>
                                            </td>
                                            <td style="text-align: right; width: 50%;">
                                                <h6><label class="label label-info">' . $row['NOPEN'] . '</label><br>' . $row['TGL_PENDAFTARAN'] . '</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%;">
                                                <button type="button" class="btn btn-block btn-primary btn-sm waves-effect waves-light btn-out-dashed" onclick="PanggilPasien(' . $row['NOPEN'] . ')">Layani</button>
                                            </td>
                                            <td style="width: 50%;">
                                                <button type="button" class="btn btn-block btn-danger btn-sm waves-effect waves-light btn-out-dashed">Batal</button>
                                            </td>
                                        </r>
                                    </table>
                                </li>';
                endforeach;

                $msg = [
                    'data' => $isidata
                ];
                echo json_encode($msg);
            }
        }
    }
}
