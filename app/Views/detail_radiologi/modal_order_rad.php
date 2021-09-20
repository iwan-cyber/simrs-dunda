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
    <?= form_open('Radiologi/simpanOrder', ['class' => 'formOrderRad']); ?>
    <div class="modal fade" id="modalOrderRad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-file"></i> Formulir Permintaan Radiologi</h5>
                    <table>
                        <tr>
                            <td>Orda:</td>
                            <td>
                                <select class="form-control select2 form-control-sm" id="orda" name="orda" required>
                                    <option value="N">Tidak</option>
                                    <option value="Y">YA</option>
                                </select>
                            </td>
                            <td><input type="text" id="nopen_order_rad" class="form-control form-control-sm input-danger" name="nopen_order_rad" readonly required></td>
                            <td><input type="date" name="tgl_order" value="<?= date('Y-m-d'); ?>" class="form-control form-control-sm"></td>
                            <td><input type="time" name="jam_order" value="<?= date("H:i:s"); ?>" class="form-control form-control-sm"></td>
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
                                                    <td>KLINIS</td>
                                                    <td>: <input type="text" class="form-control-sm" name="klinis" placeholder="Klinis..." required style="width: 100%;"></td>
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
                                        <tbody class="tb-addorder">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12">
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>DAFTAR TINDAKAN RADIOLOGI</h5>
                                </div>
                                <div class="card-body myScroll2">
                                    <table class="table-hover" cellspacing="0" id="daftartindakanrad" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NAMA PEMERIKSAAN</th>
                                                <th class="text-center">GOLONGAN</th>
                                                <th class="text-center">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-info">

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?= user()->id; ?>" name="userPengirim" id="userPengirim" required>
    <input type="hidden" value="<?= $item->IDPASIEN; ?>" name="idPasien" id="idPasien" required>
    <input type="hidden" value="<?= $item->NORM; ?>" name="norm" id="norm" required>
    <input type="hidden" value="<?= $item->IDRUANGAN; ?>" name="idruangan" id="idruangan" required>
    <input type="hidden" value="<?= $item->NOPEN; ?>" name="nopen" id="nopen" required>
    <?= form_close(); ?>
<?php } ?>

<script>
    $('.formOrderRad').submit(function(e) {
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
                    'Order Radiologi Berhasil Dikirim!',
                    'success'
                )
                $('#modalOrderRad').modal('hide');
                $('#torder_rad').DataTable().ajax.reload(null, false);
            }
        });
        return false;
    })
    $(document).ready(function() {
        $('#daftartindakanrad').DataTable({
            oLanguage: {
                "sEmptyTable": "Data tidak ditemukan!",
                "sInfo": "Tampil _START_ sampai _END_ hingga _TOTAL_ baris",
                "sInfoEmpty": "Tampil 0 s/d 0 Hingga 0 Data",
                "sInfoFiltered": "(filtered from _MAX_ total baris)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan _MENU_ Baris",
                "sLoadingRecords": "Loading...",
                "sProcessing": "<div class='preloader3 loader-block'><div class='circ1 loader-success'></div><div class='circ2 loader-success'></div><div class='circ3 loader-success'></div><div class='circ4 loader-success'></div></div>",
                "sSearch": "Pencarian:",
                "sZeroRecords": "Data tidak ditemukan!",

            },
            fixedHeader: true,
            searching: true,
            responsive: true,
            destroy: true,
            processing: true,
            serverSide: true,
            ordering: true,

            ajax: {
                url: '<?= base_url('radiologi/datatindakanradiologi'); ?>',

            },
            columns: [{
                data: 'NAMA_TINDAKAN',
                name: 'NAMA_TINDAKAN'
            }, {
                data: 'KATEGORI',
                name: 'KATEGORI',
                class: 'text-center'
            }, {
                data: 'aksi',
                name: 'aksi'
            }, ],
        });


        // generate nopen inap
        detik = new Date().getSeconds();
        menit = new Date().getMinutes();
        jamSekarang = new Date().getHours();
        tglSekarang = new Date().getDate();
        blnSekarang = new Date().getMonth();
        thnSekarang = new Date().getFullYear();
        document.getElementById("nopen_order_rad").value = 'RAD-' + getNopen(5) + '/' + tglSekarang + '/' + blnSekarang + '/' + thnSekarang + '.' + jamSekarang + '' + menit + '' + detik;

        $('.btn-info').click(function() {
            $('.btn-info').removeClass('bg-red');
            $(this).addClass('bg-red');
        })
        $('.select2').select2({
            dropdownParent: $('#modalOrderRad'),
            theme: "classic",
        });

        $('#dokterOrder').select2({
            dropdownParent: $('#modalOrderRad'),
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
    });

    function addOrderRad([ID, NAMA_TINDAKAN]) {
        $('.tb-addorder').append(`<tr id="baris_` + ID + `">
                                <td><input type="hidden" name="id_tindakanradd[]" type="text"value="` + ID + `">` + NAMA_TINDAKAN + `</td>
                                <td style="text-align: center;">Order</td>
                                <td style="text-align: center;"><button class="btn btn-mini btn-danger" onclick="hapusOrderRad([` + ID + `])"><i class="fas fa-trash"></i></button></td>
                            </tr>`);
    }

    function hapusOrderRad([ID]) {
        $('#baris_' + ID).remove();
    };
</script>