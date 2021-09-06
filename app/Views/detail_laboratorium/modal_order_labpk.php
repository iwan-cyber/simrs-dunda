<?php
// function hitung_umur($tanggal_lahir)
// {
//     list($year, $month, $day) = explode("-", $tanggal_lahir);
//     $year_diff  = date("Y") - $year;
//     $month_diff = date("m") - $month;
//     $day_diff   = date("d") - $day;
//     if ($month_diff < 0) $year_diff--;
//     elseif (($month_diff == 0) && ($day_diff < 0)) $year_diff--;
//     return $year_diff;
// }

function GetUmur($tgl_lahir)
{

    // ubah ke format Ke Date Time
    $lahir = new DateTime($tgl_lahir);
    $hari_ini = new DateTime();

    $diff = $hari_ini->diff($lahir);

    return  $diff->y . " Tahun" . " " . $diff->m . " Bulan" .  " " . $diff->d . " Hari";
}

$dataArr = json_decode($data);
foreach ($dataArr->data as $item) { ?>
    <?= form_open('Laboratoriumpk/simpanOrder', ['class' => 'formOrderLabPk']); ?>
    <div class="modal fade" id="modalOrderLabPk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-file"></i> Formulir Permintaan Laboratorium Patologi Klinik</h5>
                    <table>
                        <tr>
                            <td>Orda:</td>
                            <td>
                                <select class="form-control select2 form-control-sm" id="orda" name="orda" required>
                                    <option value="N">Tidak</option>
                                    <option value="N">YA</option>
                                </select>
                            </td>
                            <td><input type="text" id="nopen_order_labpk" class="form-control form-control-sm input-danger" name="nopen_order_labpk" readonly required></td>
                            <td><input type="date" name="tgl_order_labpk" value="<?= date('Y-m-d'); ?>" class="form-control form-control-sm"></td>
                            <td><input type="time" name="jam_order_labpk" value="<?= date("H:i:s"); ?>" class="form-control form-control-sm"></td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-primary btn-block btn-simpan">Kirim</button>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>DETAIL PASIEN</h5>
                                        </div>
                                        <div class="card-body table-responsive pad">
                                            <table class="display">
                                                <tr>
                                                    <td>NOMR</td>
                                                    <td>: <?= $item->NORM; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NAMA LENGKAP</td>
                                                    <td>: <?= $item->NAMA; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>TGL. LAHIR</td>
                                                    <td>: <?= date('d F Y', strtotime($item->TGL_LAHIR)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>UMUR SAAT INI</td>
                                                    <td>: <?= GetUmur($item->TGL_LAHIR); ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>J. KELAMIN</td>
                                                    <td>: <?php if ($item->JENKEL == 'l') {
                                                                echo "Laki-laki";
                                                            } else {
                                                                echo "Perempuan";
                                                            }; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>DPJP</td>
                                                    <td>: <?= $item->DPJP; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>PENJAMIN</td>
                                                    <td>: <?= $item->PENJAMIN; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>STATUS</td>
                                                    <td>: <?php if ($item->STATUS == 1) {
                                                                echo 'Sedang dilayani';
                                                            }; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>UNIT ASAL</td>
                                                    <td>: <?= $item->RUANGAN; ?> </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>DOKTER & UNIT ASAL</h5>
                                        </div>
                                        <div class="card-body">
                                            <table style="width: 100%;" class="display">
                                                <tr>
                                                    <td>DOKTER</td>
                                                    <td>: <select class="form-control select2 form-control-sm" id="dokterOrder" name="dokterOrder" required>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td>UNIT ASAL</td>
                                                    <td>: <?= user()->name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>KELUHAN</td>
                                                    <td>: </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>DAFTAR TAMPUNG ORDER/PERMINTAAN</h5>
                                </div>
                                <div class="card-body myScroll">
                                    <table class="table table-hover display" cellspacing="0" width="100%" id="tborderpk">
                                        <tbody class="tklabpk">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>DAFTAR PEMERIKSAAN</h5>
                                </div>
                                <div class="card-body">
                                    <div class="pcoded-inner-content table-responsive pad">
                                        <table>
                                            <tr id="tabs-kelompok">
                                            </tr>
                                        </table>
                                        </hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-sm-12 myScroll">
                                            <div id="tampilsub"></div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-sm-12 myScroll">
                                            <div id="tampillistpemeriksaan"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="cek"></div>
                        <input type="hidden" value="<?= user()->id; ?>" name="userPengirim" id="userPengirim" required>
                        <input type="hidden" value="<?= $item->IDPASIEN; ?>" name="idPasien" id="idPasien" required>
                        <input type="hidden" value="<?= $item->NORM; ?>" name="norm" id="norm" required>
                        <input type="hidden" value="<?= $item->IDRUANGAN; ?>" name="idruangan" id="idruangan" required>
                        <input type="hidden" value="<?= $item->NOPEN; ?>" name="nopen" id="nopen" required>
                    </div>
                </div>
                <div class="modal-footer bg-info">

                </div>
            </div>

        </div>
    </div>


    <?= form_close(); ?>
<?php } ?>
<script>
    function tbnorderlist([id_uji, uji_tes, nama_sub, id_sub, id_kelompok]) {
        $('.tklabpk').append(`<tr id="baris_` + id_uji + `">
                                <td><input type="hidden" name="id_uji[]" type="text"value="` + id_uji + `">` + uji_tes + `</td>
                                <td><input type="hidden" name="id_sub[]" type="text"value="` + id_sub + `">
                                <input type="hidden" name="id_kelompok[]" type="text"value="` + id_kelompok + `">` + nama_sub + `</td>
                                <td style="text-align: center;">Order</td>
                                <td style="text-align: center;"><button class="btn btn-mini btn-danger" onclick="hapusOrderPK([` + id_uji + `])"><i class="fas fa-trash"></i></button></td>
                            </tr>`);
    }

    function tbnsubkelompok(id_sub) {

        $.ajax({
            type: "post",
            url: "<?= base_url('Laboratoriumpk/datalistpemeriksaan') ?>",
            data: {
                idsub: id_sub
            },
            success: function(response) {
                $('#tampillistpemeriksaan').html(response);
            }
        });
    }

    function btnkelompoklabpk(id_kelompok) {
        $.ajax({
            type: "post",
            url: "<?= base_url('Laboratoriumpk/datasubkelompok') ?>",
            data: {
                idkelompok: id_kelompok
            },
            success: function(response) {
                $('#tampilsub').html(response);
                $('#tampillistpemeriksaan').html('');
            }
        });
    }

    function hapusOrderPK([id_uji, uji_tes]) {
        $('#baris_' + id_uji).remove();
    };


    $(document).ready(function() {

        // generate nopen inap
        detik = new Date().getSeconds();
        menit = new Date().getMinutes();
        jamSekarang = new Date().getHours();
        tglSekarang = new Date().getDate();
        blnSekarang = new Date().getMonth();
        thnSekarang = new Date().getFullYear();
        document.getElementById("nopen_order_labpk").value = 'L.PK-' + getNopen(5) + '/' + tglSekarang + '/' + blnSekarang + '/' + thnSekarang + '.' + jamSekarang + '' + menit + '' + detik;

        $('.btn-info').click(function() {
            $('.btn-info').removeClass('bg-red');
            $(this).addClass('bg-red');
        })
        $('.select2').select2({
            dropdownParent: $('#modalOrderLabPk'),
            theme: "classic",
        });

        $('#dokterOrder').select2({

            dropdownParent: $('#modalOrderLabPk'),
            minimumInputLength: 1,
            allowClear: true,
            placeholder: 'Pilih Dokter Pengirim',
            theme: "classic",
            selectOnClose: true,
            ajax: {
                dataType: 'json',
                url: "<?= base_url('Masterdata/GetDokterOrder') ?>",
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                },
            }
        })

        $.ajax({
            type: "post",
            url: "<?= base_url('Laboratoriumpk/datakelompok'); ?>",

            success: function(response) {
                $('#tabs-kelompok').html(response);
            }
        });
    });

    $('.formOrderLabPk').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Menyimpan...');
            },
            complete: function() {
                $('.btn-simpan').removeAttr('disable', 'disabled');
                $('.btn-simpan').html('Simpan');
            },
            success: function(response) {
                Swal.fire(
                    'Berhasil!',
                    'Order Lab. Patologi Klinik Berhasil Dikirim!. Sampel pasien sudah dapat dibawah ke Lab. Patologi Klinik!',
                    'success'
                )
                $('#modalOrderLabPk').modal('hide');
                $('#torder_labpk').DataTable().ajax.reload(null, false);
            }
        });
        return false;
    })
</script>