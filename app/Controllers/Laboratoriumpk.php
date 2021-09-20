<?php

namespace App\Controllers;

use App\Models\Modelorder_labpk;
use Irsyadulibad\DataTables\DataTables;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;
use PhpParser\Node\Stmt\GroupUse;

class laboratoriumpk extends BaseController
{
    public function form_entri_hasil()
    {
        $db = \Config\Database::connect();
        $noOrder = $this->request->getVar('norder');
        $row = DataTables::use('v_group_order_labpk')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_labpk.NO_ORDER as NOORDER, v_group_order_labpk.TGL_ORDER as TGLORDER, v_group_order_labpk.JAM_ORDER as JAMORDER, v_group_order_labpk.STATUS_ORDER as STATUSORDER, v_group_order_labpk.NOPEN as NOPEN, m_pasien.NAMA as NAMA, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, v_group_order_labpk.NORM, m_pegawai.NAMA_PEGAWAI as DOKTERPENGIRIM, m_penjamin.PENJAMIN as PENJAMIN, m_ruangan.RUANGAN as RUANGAN, pendaftaran.STATUS as STATUS, v_group_order_labpk.ORDA AS ORDA, v_group_order_labpk.HASIL_TANGGAL as HASILTGL, v_group_order_labpk.HASIL_JAM as HASILJAM')

            ->join('m_pegawai', 'v_group_order_labpk.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')
            ->join('m_pasien', 'v_group_order_labpk.NORM = m_pasien.NOMR', 'INNER')
            ->join('pendaftaran', 'v_group_order_labpk.NOPEN = pendaftaran.NOPEN', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->where(['v_group_order_labpk.NO_ORDER' => $noOrder])
            ->make(true);
        $data = [
            'id' => $noOrder,
            'data'  => $row
        ];
        return  view('detail_laboratorium/modal_entri_hasil', $data);
    }

    public function cetakhasil()
    {
        $db = \Config\Database::connect();
        $noOrder = $this->request->getVar('norder');
        $row = DataTables::use('v_group_order_labpk')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_labpk.NO_ORDER as NOORDER, v_group_order_labpk.TGL_ORDER as TGLORDER, v_group_order_labpk.JAM_ORDER as JAMORDER, v_group_order_labpk.STATUS_ORDER as STATUSORDER, v_group_order_labpk.NOPEN as NOPEN, m_pasien.NAMA as NAMA, m_pasien.TGLLAHIR as TGL_LAHIR, m_pasien.JENISKELAMIN as JENKEL, m_pasien.id as IDPASIEN, v_group_order_labpk.NORM, m_pegawai.NAMA_PEGAWAI as DOKTERPENGIRIM, m_penjamin.PENJAMIN as PENJAMIN, m_ruangan.RUANGAN as RUANGAN, pendaftaran.STATUS as STATUS, v_group_order_labpk.ORDA AS ORDA, v_group_order_labpk.HASIL_TANGGAL as HASILTGL, v_group_order_labpk.HASIL_JAM as HASILJAM, v_group_order_labpk.HASIL_KESAN as KESAN, v_group_order_labpk.HASIL_VALIDATOR_I AS VALIDI, v_group_order_labpk.HASIL_VALIDATOR_II AS VALIDII')

            ->join('m_pegawai', 'v_group_order_labpk.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')
            ->join('m_pasien', 'v_group_order_labpk.NORM = m_pasien.NOMR', 'INNER')
            ->join('pendaftaran', 'v_group_order_labpk.NOPEN = pendaftaran.NOPEN', 'INNER')
            ->join('m_penjamin', 'pendaftaran.ID_PENJAMIN = m_penjamin.ID', 'INNER')
            ->join('m_ruangan', 'pendaftaran.ID_RUANGAN = m_ruangan.ID', 'INNER')
            ->where(['v_group_order_labpk.NO_ORDER' => $noOrder])
            ->make(true);
        $data = [
            'id' => $noOrder,
            'data'  => $row
        ];
        return  view('detail_laboratorium/modal_cetak_hasil', $data);
    }

    public function DataHasilOrderByNorder()
    {
        if ($this->request->isAJAX()) {
            $noOrder = $this->request->getVar('noorderlpk');
            $DaftarOrderLPK = DataTables::use('t_order_labpk')
                ->select('t_order_labpk.HASIL_LAB as HASIL, t_order_labpk.ID as IDORDER, m_uji_tes.id_uji AS IDUJI, m_uji_tes.uji_tes AS NAMAPEMERIKSAAN, t_order_labpk.NO_ORDER AS NOORDER, m_uji_tes.satuan AS SATUAN, m_uji_tes.nilai_normal AS NILAI_NORMAL, t_order_labpk.HASIL_METODE as METODE, m_sub_kelompok.nama_sub AS SUBKELOMPOK, t_order_labpk.HASIL_VALIDATOR_I AS VALIDI, t_order_labpk.HASIL_VALIDATOR_II AS VALIDII')
                ->join('m_uji_tes', 't_order_labpk.ID_UJI = m_uji_tes.id_uji', 'LEFT')
                ->join('m_sub_kelompok', 't_order_labpk.ID_SUB=m_sub_kelompok.id_sub', 'LEFT')

                ->addColumn('PEMERIKSAAN', function ($data) {
                    return "$data->NAMAPEMERIKSAAN";
                })
                ->addColumn('HASIL', function ($data) {
                    return "$data->HASIL";
                })
                ->addColumn('SUBKELOMPOK', function ($data) {
                    return "$data->SUBKELOMPOK";
                })
                ->addColumn('METODE', function ($data) {
                    return "$data->METODE";
                })
                ->addColumn('SATUAN', function ($data) {
                    return "$data->SATUAN";
                })
                ->addColumn('NILAI_NORMAL', function ($data) {
                    return "$data->NILAI_NORMAL";
                })

                ->where(['t_order_labpk.NO_ORDER' => $noOrder])
                ->make(true);
            return $DaftarOrderLPK;
        }
    }

    public function form_order()
    {
        $db = \Config\Database::connect();

        if ($this->request->isAJAX()) {
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

            return  view('detail_laboratorium/modal_order_labpk', $data);
            // d($data);
        }
    }

    public function datakelompok()
    {
        if ($this->request->isAJAX()) {

            $dataKelompokLabPK = $this->db->table('m_kelompok_uji')->get();

            if ($dataKelompokLabPK->getNumRows() > 0) {

                $isidata = "";
                foreach ($dataKelompokLabPK->getResultArray() as $row) :

                    $isidata .= "<td><button type=\"button\" class=\"btn waves-effect waves-light btn-linkedin btn-sm col-md bg-info\" onclick=\"return btnkelompoklabpk(" . $row['id_kelompok'] . ")\"><i class=\"far fa-folder-open\"></i> " . $row['nama_kelompok'] . "</button></td>";

                endforeach;

                echo $isidata;
            }
        }
    }

    public function datasubkelompok()
    {
        if ($this->request->isAJAX()) {
            $idkelompok = $this->request->getVar('idkelompok');
            $datasubkelompok = $this->db->table('m_sub_kelompok')
                ->select('m_sub_kelompok.nama_sub, m_sub_kelompok.id_sub, m_kelompok_uji.nama_kelompok')
                ->join('m_kelompok_uji', 'm_sub_kelompok.id_kelompok=m_kelompok_uji.id_kelompok', 'LEFT')
                ->where(['m_kelompok_uji.id_kelompok' => $idkelompok])
                ->get();

            if ($datasubkelompok->getNumRows() > 0) {

                $isidata = "";
                foreach ($datasubkelompok->getResultArray() as $row) :
                    $isidata .= "<button type=\"button\" class=\"btn btn-info waves-effect waves-light btn-sm col-md text-left mt-1\"  onclick=\"return tbnsubkelompok(" . $row['id_sub'] . ")\"><i class=\"far fa-folder-open\"></i> " . strtoupper($row['nama_sub']) . " <span class=\"pcoded-badge label label-danger label-right\">" . strtoupper($row['nama_kelompok']) . "</span></button>";
                endforeach;
                echo $isidata;
            }
        }
    }
    public function datalistpemeriksaan()
    {
        if ($this->request->isAJAX()) {
            $idsub = $this->request->getVar('idsub');
            $datasubkelompok = $this->db->table('m_uji_tes')
                // ->select('m_sub_kelompok')
                ->join('m_sub_kelompok', 'm_uji_tes.id_sub=m_sub_kelompok.id_sub', 'LEFT')
                ->join('m_kelompok_uji', 'm_uji_tes.id_kelompok=m_kelompok_uji.id_kelompok', 'LEFT')
                ->where(['m_uji_tes.id_sub' => $idsub])
                ->get();

            if ($datasubkelompok->getNumRows() > 0) {

                $isidata = "<table id=\"tblistpemeriksaan\" class=\"table table-hover display\" style=\"width: 100%;\">
                                <tr>
                                    <th class=\"text-center\">JENIS PEMERIKSAAN</th>
                                    <th class=\"text-center\">SATUAN</th>
                                    <th class=\"text-center\">NILAI NORMAL</th>
                                    <th class=\"text-center\">ACTION</th>
                                </tr>";
                foreach ($datasubkelompok->getResultArray() as $row) :
                    $isidata .= "<tr>
                                    <td>" . $row['uji_tes'] . "</td>
                                    <td class=\"text-center\">" . $row['satuan'] . "</td>
                                    <td class=\"text-center\">" . $row['nilai_normal'] . "</td>
                                    <td class=\"text-center\"><button type=\"button\" class=\"btn waves-effect waves-light btn-linkedin btn-mini btn-tab-labpk-kelompok\" onclick=\"return tbnorderlist(['" . $row['id_uji'] . "','" . $row['uji_tes'] . "','" . $row['nama_sub'] . "','" . $row['id_sub'] . "','" . $row['id_kelompok'] . "'])\"><i class=\"fas fa-plus-circle pull-right\"></i> Order</button></td>
                                </tr>";
                endforeach;
                $isidata .= "</table>";
                echo $isidata;
            }
        }
    }

    public function simpanOrder()
    {
        $db = \Config\Database::connect();
        if ($this->request->isAJAX()) { {

                $idUji = $this->request->getPost('id_uji');
                $idSub = $this->request->getPost('id_sub');
                $idKelompok = $this->request->getPost('id_kelompok');
                $noOrder = $this->request->getPost('nopen_order_labpk');
                $nopen = $this->request->getPost('nopen');
                $tglOder = $this->request->getPost('tgl_order_labpk');
                $jamOrder = $this->request->getPost('jam_order_labpk');
                $idPasien = $this->request->getPost('idPasien');
                $norm = $this->request->getPost('norm');
                $DOkPengirim = $this->request->getPost('dokterOrder');
                $idRuangAsal = $this->request->getPost('idruangan');
                $UserPengirim = $this->request->getPost('userPengirim');
                $orda = $this->request->getPost('orda');
                $data = array();
                $index = 0;
                foreach ($idUji as $dataidUji) {
                    array_push($data, array(
                        'NO_ORDER' => $noOrder,
                        'NOPEN' => $nopen,
                        'TGL_ORDER' => $tglOder,
                        'JAM_ORDER' => $jamOrder,
                        'IDPASIEN' => $idPasien,
                        'NORM' => $norm,
                        'DOKTER_PENGIRIM' => $DOkPengirim,
                        'ID_RUANGAN' => $idRuangAsal,
                        'ID_KELOMPOK' => $idKelompok[$index],
                        'ID_SUB' => $idSub[$index],
                        'ID_UJI' => $dataidUji,
                        'ORDA' => $orda,
                        // 'STATUS_ORDER',
                        'USER_PENGIRIM' => $UserPengirim
                    ));
                    $index++;
                }

                $torderlabPk = new Modelorder_labpk();
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

    public function TampilOrderLabPK()
    {
        $norm = $this->request->getVar('norm');
        $builder = DataTables::use('v_group_order_labpk')
            ->select('m_pegawai.NAMA_PEGAWAI as NAMA_PEGAWAI, v_group_order_labpk.NO_ORDER as NOORDER, v_group_order_labpk.TGL_ORDER as TANGGAL, v_group_order_labpk.JAM_ORDER as JAMORDER, v_group_order_labpk.STATUS_ORDER as STATUS, v_group_order_labpk.NOPEN as NOPEN, v_group_order_labpk.HASIL_TANGGAL as HASILTGL, v_group_order_labpk.HASIL_JAM as HASILJAM')
            ->join('m_pegawai', 'v_group_order_labpk.DOKTER_PENGIRIM = m_pegawai.ID', 'INNER')

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
                if ($data->STATUS == 0) { //sampel baru dikirim
                    return "<label class='label label-primary'>Sampel belum diterima</label>";
                } elseif ($data->STATUS == 1) { // sampel sudah diterima dilab pk
                    return "<label class='label label-primary'>Sampel sudah diterima</label>";
                } elseif ($data->STATUS == 2) { // hasil lab
                    return "<label class='label label-success'>Hasil lab sudah terbit</label>";
                } elseif ($data->STATUS == 2) { // hasil lab
                    return "<label class='label label-danger'>Order dibatalkan</label>";
                }
            })

            ->addColumn('aksi', function ($data) {
                if ($data->STATUS == 0) {
                    return "<div class=\"btn-group\" role=\"group\" data-backdrop=\"static\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\".btn-xlg\">

                    <button type=\"button\" class=\"btn btn-inverse btn-mini waves-effect waves-light btn-ubah\" onclick=\"ubahData('" . $data->NOORDER . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\" title=\"Ubah Order\"><i class=\"ti-pencil-alt\"></i> </button>

                    <button type=\"button\" class=\"btn btn-primary btn-mini waves-effect waves-light btn-ubah\" onclick=\"cetakHasil('" . $data->NOORDER . "')\" data-toggle=\"modal\" data-target=\"#GSCCModal\" title=\"Print Hasil\"><i class=\"fas fa-print\"></i>  </button>

                    <button type=\"button\" onclick=\"BatalOrder('" . $data->NOORDER . "')\"  data-backdrop=\"static\" class=\"btn btn-danger btn-mini waves-effect waves-light\" title=\"Batalkan Order\"><i class=\"fas fa-ban\"></i> </button>

                    <button type=\"button\" onclick=\"ProsesOrder('" . $data->NOORDER . "')\"  data-backdrop=\"static\" class=\"btn btn-success btn-mini waves-effect waves-light\" title=\"Proses Order / Pelayanan Laboratorium\"><i class=\"fas fa-vials\"></i> </button>

                </div>";
                }

                if ($data->STATUS == 0) { //sampel baru dikirim
                    return "<button type=\"button\" class=\"btn btn-primary btn-mini waves-effect waves-light btn-ubah\" onclick=\"ubahData('" . $data->NOORDER . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\"><i class=\"ti-pencil-alt\"></i> Ubah Order </button>";
                } elseif ($data->STATUS == 1) { // sampel sudah diterima dilab pk
                    return "<label class='label label-primary'> Sampel sudah diterima</label>";
                } elseif ($data->STATUS == 2) { // hasil lab
                    return "<button type=\"button\" class=\"btn btn-success btn-mini waves-effect waves-light btn-ubah\" onclick=\"cetakHasil('" . $data->NOORDER . "')\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#GSCCModal\"><i class=\"fas fa-print\"></i> Cetak Salinan Hasil Lab</button>";
                } elseif ($data->STATUS == 3) { // hasil lab
                    return "<label class='label label-danger'> Order dibatalkan</label>";
                }
            })

            ->rawColumns(['aksi', 'STATUS']) //tambahkan rawColumns agar terbaca kode HTML pada name aksiubah
            ->where(['v_group_order_labpk.NORM' => $norm])
            ->make(true);

        // $this->builder->groupBy('v_group_order_labpk.NO_ORDER');
        return $builder;
    }

    public function DataOrderByNorder()
    {
        if ($this->request->isAJAX()) {
            $noOrder = $this->request->getVar('noorderlpk');

            $DaftarOrderLPK = $this->db->table('t_order_labpk')
                ->select('t_order_labpk.HASIL_LAB as HASIL, t_order_labpk.ID as IDORDER, m_uji_tes.id_uji AS IDUJI, m_uji_tes.uji_tes AS NAMAPEMERIKSAAN, t_order_labpk.NO_ORDER AS NOORDER, m_uji_tes.satuan AS SATUAN, m_uji_tes.nilai_normal AS NILAI_NORMAL, t_order_labpk.HASIL_METODE as METODE')
                ->join('m_uji_tes', 't_order_labpk.ID_UJI = m_uji_tes.id_uji', 'LEFT')
                ->where(['t_order_labpk.NO_ORDER' => $noOrder])
                ->get();

            $isidata = "";
            foreach ($DaftarOrderLPK->getResultArray() as $row) :
                $isidata .= "
                    <tr>
                        <td><button type=\"button\" class=\"btn btn-mini btn-danger\" onclick=\"GetHapuspemeriksaanOrderById('" . $row['IDORDER'] . "')\">Batalkan</button></td>
                        <td style=\"text-align: left;\">" . $row['NAMAPEMERIKSAAN'] . "
                        <input type=\"hidden\" name=\"idorder[]\" value=\"" . $row['IDORDER'] . "\" required>
                        </td>
                        <td><input type=\"text\" placeholder=\"Entri hasil...\" value=\"" . $row['HASIL'] . "\" name=\"hasil[]\" id=\"hasil[]\" style=\"width: 50px;\" required></td>
                        <td>
                            <select class=\"form-control-sm\" name=\"metode[]\" id=\"metode[]\" required>
                                
                                ";
                if ($row['METODE'] == 'Imunokromatografi') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\" selected>Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Enzimatik: Heksokinase') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\" selected>Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Enzimatik Jaffe') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\" selected>Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Westergreen') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\" selected>Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'POCT Imunokromatografi') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\" selected>POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'GOD POD') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\" selected>GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Spektrofotometri') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\" selected>Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Enzimatik Kinetik') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\" selected>Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'GPO - PAP') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\" selected>GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'CHOD - PAP') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\" selected>CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Biuret') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\" selected>Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Brom Creasol Green (BCG)') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\" selected>Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Enzimatik UV') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\" selected>Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Kololimetrik') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\" selected>Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                } elseif ($row['METODE'] == 'Afinitas Boronat') {
                    $isidata .= "
                                    <option value=\"\">Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\" selected>Afinitas Boronat</option>";
                } else {
                    $isidata .= "
                                    <option value=\"\" selected>Pilih</option>
                                    <option value=\"Imunokromatografi\">Imunokromatografi</option>
                                    <option value=\"Enzimatik: Heksokinase\">Enzimatik: Heksokinase</option>
                                    <option value=\"Enzimatik Jaffe\">Enzimatik Jaffe</option>
                                    <option value=\"Westergreen\">Westergreen</option>
                                    <option value=\"POCT Imunokromatografi\">POCT Imunokromatografi</option>
                                    <option value=\"GOD POD\">GOD POD</option>
                                    <option value=\"Spektrofotometri\">Spektrofotometri</option>
                                    <option value=\"Enzimatik Kinetik\">Enzimatik Kinetik</option>
                                    <option value=\"GPO - PAP\">GPO - PAP</option>
                                    <option value=\"CHOD - PAP\">CHOD - PAP</option>
                                    <option value=\"Biuret\">Biuret</option>
                                    <option value=\"Brom Creasol Green (BCG)\">Brom Creasol Green (BCG)</option>
                                    <option value=\"Enzimatik UV\">Enzimatik UV</option>
                                    <option value=\"Kololimetrik\">Kololimetrik</option>
                                    <option value=\"Afinitas Boronat\">Afinitas Boronat</option>";
                }

                $isidata .= "</select>
                        </td>
                        <td>" . $row['SATUAN'] . "</td>
                        <td>" . $row['NILAI_NORMAL'] . "</td>
                    </tr>           
            ";
            endforeach;

            $msg = [
                'data' => $isidata
            ];
            echo json_encode($msg);
        }
    }

    public function HapusPemeriksaanOrderById()
    {
        if ($this->request->isAJAX()) {
            $idorder = $this->request->getVar('idorder');
            // Panggila Model order lab pk
            $orderlabpk = new Modelorder_labpk();
            $orderlabpk->delete($idorder);
            $msg = [
                'sukses' => 'Jenis pemeriksaan tersebut berhasil dihapus!'
            ];
            echo json_encode($msg);
        }
    }

    public function SimpanHasilOrder()
    {
        if ($this->request->isAJAX()) {
            $idorder = $this->request->getPost('idorder');
            $hasil = $this->request->getPost('hasil');
            $tanggal = $this->request->getPost('tgl_order_labpk');
            $jam = $this->request->getPost('jam_order_labpk');
            $metode = $this->request->getPost('metode');
            $kesan = $this->request->getPost('kesan');
            $validi = $this->request->getPost('validatori');
            $validii = $this->request->getPost('validatorii');
            $data = array();
            $index = 0;
            foreach ($idorder as $dataidorder) {
                array_push($data, array(
                    'ID' => $idorder[$index],
                    'HASIL_LAB' => $hasil[$index],
                    'HASIL_TANGGAL' => $tanggal,
                    'HASIL_JAM' => $jam,
                    'HASIL_METODE' => $metode[$index],
                    'HASIL_KESAN' => $kesan,
                    'HASIL_VALIDATOR_I' => $validi,
                    'HASIL_VALIDATOR_II' => $validii,
                    'STATUS_ORDER' => 2,
                ));
                $index++;
            }

            $torderlabPk = new Modelorder_labpk();
            $torderlabPk->update_batch($data, 'ID'); // update banyak record
            $msg = [
                'sukses' => 'Simpan hasil lab berhasil!!'
            ];
            echo json_encode($msg);
        }
    }
}
