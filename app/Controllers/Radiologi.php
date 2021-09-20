<?php

namespace App\Controllers;

use App\Models\Modelorder_rad;
use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use PhpParser\Node\Stmt\GroupUse;

class Radiologi extends BaseController
{
    public function form_order()
    {
        $db = \Config\Database::connect();

        // if ($this->request->isAJAX()) {
        $nopen = $this->request->getVar('nopen');
        $row = DataTables::use('pendaftaran')
            ->select('pendaftaran.NOPEN as NOPEN, pendaftaran.NORM as NORM, m_pasien.NAMA as NAMA, pendaftaran.STATUS as STATUS, pendaftaran.TGL_PENDAFTARAN as TGL_PENDAFTARAN, pendaftaran.JAM_PENDAFTARAN as JAM_PENDAFTARAN, m_pegawai.NAMA_PEGAWAI as DPJP, m_ruangan.RUANGAN as RUANGAN, m_penjamin.PENJAMIN as PENJAMIN, pendaftaran.CITO as CITO, pendaftaran.RESIKO_JATUH as RESIKO_JATUH, m_instalasi.INSTALASI as INSTALASI,  pendaftaran.ID_INSTALASI as IDINSTALASI, antrian_poli.ANTRIAN as NOANTRIAN, m_bed.NO_BED as BED, m_kamar.NAMA_KAMAR as KAMAR, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, m_ruangan.ID as IDRUANGAN')
            ->join('m_pasien', 'pendaftaran.NORM = m_pasien.NOMR', 'INNER')
            ->join('m_pegawai', 'pendaftaran.ID_DOKTER = m_pegawai.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_instalasi', 'pendaftaran.ID_INSTALASI = m_instalasi.ID', 'INNER')
            ->join('antrian_poli', 'pendaftaran.NOPEN = antrian_poli.NOPEN', 'LEFT')
            ->join('pendaftaran_ranap', 'pendaftaran.NOPEN = pendaftaran_ranap.NOPEN', 'LEFT')
            ->join('m_bed', 'pendaftaran_ranap.ID_BED = m_bed.ID', 'LEFT')
            ->join('m_kamar', 'm_bed.IDKAMAR = m_kamar.ID', 'LEFT')
            ->where(['pendaftaran_ranap.NOPEN' => $nopen])->make(true);
        $data = [
            'id' => $nopen,
            'data'  => $row
        ];

        return  view('detail_radiologi/modal_order_rad', $data);
    }

    function datatindakanradiologi()
    {
        return DataTables::use('m_tarif_rad')

            ->addColumn('NAMA_TINDAKAN', function ($data) {
                return "$data->NAMA_TINDAKAN";
            })

            ->addColumn('KATEGORI', function ($data) {
                return "$data->KATEGORI";
            })


            ->addColumn('aksi', function ($data) {
                return "<button type=\"button\" onclick=\"addOrderRad(['" . $data->ID . "','" . $data->NAMA_TINDAKAN . "'])\"  data-backdrop=\"static\" class=\"btn btn-danger btn-mini waves-effect waves-light\"><i class=\"fas fa-plus-circle pull-right\"></i> Order</button>";
            })

            ->rawColumns(['aksi']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->make(true);
    }

    public function simpanOrder()
    {
        $db = \Config\Database::connect();
        if ($this->request->isAJAX()) { {

                $idtindakanrad = $this->request->getPost('id_tindakanradd');
                $nopen = $this->request->getPost('nopen');
                $noOrder = $this->request->getPost('nopen_order_rad');
                $tglOder = $this->request->getPost('tgl_order');
                $jamOrder = $this->request->getPost('jam_order');
                $idPasien = $this->request->getPost('idPasien');
                $norm = $this->request->getPost('norm');
                $klinis = $this->request->getPost('klinis');
                $DOkPengirim = $this->request->getPost('dokterOrder');
                $idRuangAsal = $this->request->getPost('idruangan');
                // $UserPengirim = $this->request->getPost('userPengirim');
                $orda = $this->request->getPost('orda');
                $data = array();
                $index = 0;
                foreach ($idtindakanrad as $dataorderrad) {
                    array_push($data, array(
                        'NO_ORDER' => $noOrder,
                        'NOPEN' => $nopen,
                        'TGL_ORDER' => $tglOder,
                        'JAM_ORDER' => $jamOrder,
                        'ID_PASIEN' => $idPasien,
                        'NORM' => $norm,
                        'KLINIS' => $klinis,
                        'DOKTER_PENGIRIM' => $DOkPengirim,
                        'ID_RUANGAN' => $idRuangAsal,
                        'ID_TINDAKAN' => $dataorderrad,
                        // 'BIAYA' => ,
                        // 'KEPESERTAAN' => ,
                        // 'HASIL_RAD' => ,
                        // 'HASIL_TGL' => ,
                        // 'HASIL_JAM' => ,
                        // 'HASIL_FOTO' => ,
                        // 'HASIL_KESAN' => ,
                        // 'HASIL_EXPERTISI' => ,
                        // 'HASIL_DOK_PEMERIKSA' => ,
                        // 'STATUS' => 'N',
                        'ORDA' => $orda,
                        'ID_USER' => ''
                    ));
                    $index++;
                }

                $torderlabPk = new Modelorder_rad();
                $torderlabPk->insertBatch($data); // insert banyak record
                $msg = [
                    'sukses' => 'Order berhasil dikirim!'
                ];
                echo json_encode($msg);
            }
        } else {
            return view('error_page');
        }
    }

    public function TampilOrderRadByNorm()
    {
        $norm = $this->request->getVar('norm');
        $builder = DataTables::use('v_group_order_rad')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_rad.NO_ORDER as NOORDER, v_group_order_rad.TGL_ORDER as TANGGAL, v_group_order_rad.JAM_ORDER as JAMORDER, v_group_order_rad.STATUS as STATUS, v_group_order_rad.NOPEN as NOPEN, v_group_order_rad.HASIL_TGL as HASILTGL, v_group_order_rad.HASIL_JAM as HASILJAM')
            ->join('m_pegawai', 'v_group_order_rad.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')

            ->addColumn('NO_ORDER', function ($data) {
                return "$data->NOORDER";
            })

            ->addColumn('NOPEN', function ($data) {
                return "$data->NOPEN";
            })
            ->addColumn('TGL_ORDER', function ($data) {
                return "$data->TANGGAL";
            })

            ->addColumn('JAM_ORDER', function ($data) {
                return "$data->JAMORDER";
            })

            ->addColumn('NAMA_PEGAWAI', function ($data) {
                return "$data->NAMA_PEGAWAI";
            })

            ->addColumn('STATUS', function ($data) {
                if ($data->STATUS == "N") { //sampel baru dikirim
                    return "<label class='label label-danger'>Order</label>";
                } elseif ($data->STATUS == "Y") { // sampel sudah diterima dilab pk
                    return "<label class='label label-success'>Selesai</label>";
                }
            })

            ->addColumn('aksi', function ($data) {
                if ($data->STATUS == "N") {
                    return "<div class=\"btn-group\" role=\"group\" data-backdrop=\"static\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\".btn-xlg\">

                    <button type=\"button\" class=\"btn btn-inverse btn-mini waves-effect waves-light btn-ubah\" onclick=\"ubahData('" . $data->NOORDER . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\" title=\"Ubah Order\"><i class=\"ti-pencil-alt\"></i> </button>

                    <button type=\"button\" class=\"btn btn-primary btn-mini waves-effect waves-light btn-ubah\" onclick=\"cetakHasil('" . $data->NOORDER . "')\" data-toggle=\"modal\" data-target=\"#GSCCModal\" title=\"Print Hasil\"><i class=\"fas fa-print\"></i>  </button>

                    <button type=\"button\" onclick=\"BatalOrder('" . $data->NOORDER . "')\"  data-backdrop=\"static\" class=\"btn btn-danger btn-mini waves-effect waves-light\" title=\"Batalkan Order\"><i class=\"fas fa-ban\"></i> </button>

                    <button type=\"button\" onclick=\"ProsesOrder('" . $data->NOORDER . "')\"  data-backdrop=\"static\" class=\"btn btn-success btn-mini waves-effect waves-light\" title=\"Terima dan Entri Hasil\"><i class=\"fas fa-vials\"></i> </button>

                </div>";
                } elseif ($data->STATUS == "Y") {
                    return "<button type=\"button\" class=\"btn btn-success btn-mini waves-effect waves-light btn-ubah\" onclick=\"cetakHasil('" . $data->NOORDER . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\"><i class=\"fas fa-print\"></i> Cetak Salinan Hasil Rad</button>";
                }
            })

            ->rawColumns(['aksi', 'STATUS']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->where(['v_group_order_rad.NORM' => $norm])
            ->make(true);

        // $this->builder->groupBy('v_group_order_rad.NO_ORDER');
        return $builder;
    }

    public function form_entri_hasil()
    {
        $db = \Config\Database::connect();
        $noOrder = $this->request->getVar('norder');
        $row = DataTables::use('v_group_order_rad')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_rad.NO_ORDER as NOORDER, v_group_order_rad.TGL_ORDER as TGLORDER, v_group_order_rad.JAM_ORDER as JAMORDER, v_group_order_rad.STATUS as STATUSORDER, v_group_order_rad.NOPEN as NOPEN, m_pasien.NAMA as NAMA, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, v_group_order_rad.NORM, m_pegawai.NAMA_PEGAWAI as DOKTERPENGIRIM, m_penjamin.PENJAMIN as PENJAMIN, m_ruangan.RUANGAN as RUANGAN, pendaftaran.STATUS as STATUS, v_group_order_rad.ORDA AS ORDA, v_group_order_rad.HASIL_TGL as HASILTGL, v_group_order_rad.HASIL_JAM as HASILJAM, v_group_order_rad.HASIL_FOTO as NOFOTO, v_group_order_rad.HASIL_KESAN as KESAN, v_group_order_rad.HASIL_EXPERTISI as EXPERTISI')

            ->join('m_pegawai', 'v_group_order_rad.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')
            ->join('m_pasien', 'v_group_order_rad.NORM = m_pasien.NOMR', 'INNER')
            ->join('pendaftaran', 'v_group_order_rad.NOPEN = pendaftaran.NOPEN', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->where(['v_group_order_rad.NO_ORDER' => $noOrder])
            ->make(true);
        $data = [
            'id' => $noOrder,
            'data'  => $row
        ];
        return  view('detail_radiologi/modal_entri_hasil', $data);
    }

    public function DataOrderByNorder()
    {
        if ($this->request->isAJAX()) {
            $noOrder = $this->request->getVar('noorderlpk');

            $DaftarOrderRad = $this->db->table('t_order_rad')
                ->select('t_order_rad.HASIL_RAD as HASIL, t_order_rad.ID_ORDER as IDORDER, m_tarif_rad.ID AS IDTINDAKAN, m_tarif_rad.NAMA_TINDAKAN AS NAMAPEMERIKSAAN, t_order_rad.NO_ORDER AS NOORDER')
                ->join('m_tarif_rad', 't_order_rad.ID_TINDAKAN = m_tarif_rad.ID', 'LEFT')
                ->where(['t_order_rad.NO_ORDER' => $noOrder])
                ->get();

            $isidata = "";
            foreach ($DaftarOrderRad->getResultArray() as $row) :
                $isidata .= "
                    <tr>
                        <td><h5>" . $row['NAMAPEMERIKSAAN'] . ":</h5> 
                            <textarea class=\"form-control\" id=\"ckeditor\" name=\"hasil[]\" style=\"width: 100%; height: 200px;\" placeholder=\"Hasil...\" required>" . $row['HASIL'] . "</textarea>
                            <input type=\"hidden\" name=\"idorder[]\" value=\"" . $row['IDORDER'] . "\" required>
                            <input type=\"hidden\" name=\"biaya[]\" value=\"0\" required>
                        </td>
                    </tr>           
            ";
            endforeach;

            $msg = [
                'data' => $isidata
            ];
            echo json_encode($msg);
        }
    }

    public function SimpanHasilOrder()
    {
        if ($this->request->isAJAX()) {
            $idorder = $this->request->getPost('idorder');
            $hasil = $this->request->getPost('hasil');
            $tanggal = $this->request->getPost('tgl_order');
            $jam = $this->request->getPost('jam_order');
            $nofoto = $this->request->getPost('no_foto');
            $kesan = $this->request->getPost('kesan');
            $expertisi = $this->request->getPost('expertisi');
            $DokPemeriksa = $this->request->getPost('dok_pemeriksa');
            $biaya = $this->request->getPost('biaya');
            $data = array();
            $index = 0;
            foreach ($idorder as $dataorderrad) {
                array_push($data, array(
                    'ID_ORDER' => $idorder[$index],
                    'BIAYA' => $biaya[$index],
                    'KEPESERTAAN' => $idorder,
                    'HASIL_RAD' => $hasil[$index],
                    'HASIL_TGL' => $tanggal,
                    'HASIL_JAM' => $jam,
                    'HASIL_FOTO' => $nofoto,
                    'HASIL_KESAN' => $kesan,
                    'HASIL_EXPERTISI' => $expertisi,
                    'HASIL_DOK_PEMERIKSA' => $DokPemeriksa,
                    'STATUS' => 'Y',
                ));
                $index++;
            }

            $torderrad = new Modelorder_rad();
            $torderrad->updateBatch($data, 'ID_ORDER'); // update banyak record
            $msg = [
                'sukses' => 'Simpan hasil radiologi berhasil!!'
            ];
            echo json_encode($msg);
        }
    }

    public function cetakhasil()
    {
        $db = \Config\Database::connect();
        $noOrder = $this->request->getVar('norder');
        $row = DataTables::use('v_group_order_rad')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_rad.NO_ORDER as NOORDER, v_group_order_rad.TGL_ORDER as TGLORDER, v_group_order_rad.JAM_ORDER as JAMORDER, v_group_order_rad.STATUS as STATUSORDER, v_group_order_rad.NOPEN as NOPEN, m_pasien.NAMA as NAMA, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, v_group_order_rad.NORM, m_pegawai.NAMA_PEGAWAI as DOKTERPENGIRIM, m_penjamin.PENJAMIN as PENJAMIN, m_ruangan.RUANGAN as RUANGAN, pendaftaran.STATUS as STATUS, v_group_order_rad.ORDA AS ORDA, v_group_order_rad.HASIL_TGL as HASILTGL, v_group_order_rad.HASIL_JAM as HASILJAM, v_group_order_rad.HASIL_KESAN as KESAN, v_group_order_rad.HASIL_DOK_PEMERIKSA AS DOKTER_PEMERIKSA')

            ->join('m_pegawai', 'v_group_order_rad.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')
            ->join('m_pasien', 'v_group_order_rad.NORM = m_pasien.NOMR', 'INNER')
            ->join('pendaftaran', 'v_group_order_rad.NOPEN = pendaftaran.NOPEN', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->where(['v_group_order_rad.NO_ORDER' => $noOrder])
            ->make(true);
        $data = [
            'id' => $noOrder,
            'data'  => $row
        ];
        return  view('detail_radiologi/modal_cetak_hasil', $data);
    }

    public function DataHasilOrderByNorder()
    {
        if ($this->request->isAJAX()) {
            $noOrder = $this->request->getVar('norderrad');
            $DaftarOrderRad = $this->db->table('t_order_rad')
                ->select('t_order_rad.HASIL_RAD as HASIL, t_order_rad.HASIL_KESAN as KESAN, t_order_rad.HASIL_EXPERTISI as EXPERTISI, t_order_rad.ID_ORDER as IDORDER, m_tarif_rad.ID AS IDTINDAKAN, m_tarif_rad.NAMA_TINDAKAN AS NAMAPEMERIKSAAN, t_order_rad.NO_ORDER AS NOORDER')
                ->join('m_tarif_rad', 't_order_rad.ID_TINDAKAN = m_tarif_rad.ID', 'LEFT')
                ->where(['t_order_rad.NO_ORDER' => $noOrder])
                ->get();

            $no = 1;
            $isidata = "";
            foreach ($DaftarOrderRad->getResultArray() as $row) :
                $isidata .= "
                                <tr>
                                    <td><font>PEMERIKSAAN</font></td>
                                    <td>
                                        <font style=\"font-weight: bold;\">" . $row['NAMAPEMERIKSAAN'] . "</font>
                                        <br>
                                        <font style=\"text-align:justify;\">" . $row['HASIL'] . "</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td><font>KESAN</td>
                                    <td>
                                        <font>" . $row['KESAN'] . "</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td><font>EXPERTISI</td>
                                    <td>
                                        <font>" . $row['EXPERTISI'] . "</font>
                                    </td>
                                </tr>";
                $no++;
            endforeach;

            $msg = [
                'data' => $isidata
            ];
            echo json_encode($msg);
        }
    }

    // public function BatalkanOrderByNoOrder()
    // {
    //     if ($this->request->isAJAX()) {
    //         $noorder = $this->request->getVar('noorder');
    //         // Panggila Model order lab pk
    //         $orderrad = new Modelorder_rad();
    //         $orderrad->delete('NO_ORDER', $noorder);
    //         $msg = [
    //             'sukses' => 'Order berhasil dibatalkan!'
    //         ];
    //         echo json_encode($msg);
    //     }
    // }
}
