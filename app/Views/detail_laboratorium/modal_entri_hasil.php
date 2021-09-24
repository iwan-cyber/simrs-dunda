<?php
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
    <?= form_open('Laboratoriumpk/SimpanHasilOrder', ['class' => 'formSimpanHasilOrderLabPk']); ?>
    <div class="modal fade" id="ModalProsesOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-file"></i> Detail Order | Entri Hasil</h5>
                    <table>
                        <tr>
                            <td><input type="text" value="<?= $item->NOORDER; ?>" required id="norder_labpk" class="form-control form-control-sm input-danger" name="norder_labpk" readonly required></td>
                            <td><input type="date" name="tgl_order_labpk" required class="form-control form-control-sm"></td>
                            <td><input type="time" name="jam_order_labpk" required class="form-control form-control-sm"></td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-primary btn-block btn-simpan">Simpan</button>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5>Detail Pasien</h5>
                                                <div class="card-header-right">

                                                </div>
                                            </div>
                                            <div class="card-block">
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
                                                        <td>PENJAMIN</td>
                                                        <td>: <?= $item->PENJAMIN; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>STATUS LAYANAN</td>
                                                        <td>: <?php if ($item->STATUS == 1) {
                                                                    echo 'Sedang dilayani / Dirawat';
                                                                }; ?> </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card ">
                                            <div class="card-header">
                                                <h5>Ruangan dan Dokter Pengirim</h5>
                                                <div class="card-header-right">

                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <table class="display">
                                                    <tr>
                                                        <td>NO.ORDER</td>
                                                        <td>: <?= $item->NOORDER; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOKTER</td>
                                                        <td>: <?= $item->DOKTERPENGIRIM; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>UNIT/RUANGAN</td>
                                                        <td>: <?= $item->RUANGAN; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>TANGGAL</td>
                                                        <td>: <?= date('d F Y', strtotime($item->TGLORDER)); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>JAM</td>
                                                        <td>: <?= $item->JAMORDER; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>STATUS ORDER</td>
                                                        <td>: <?php if ($item->STATUSORDER == 0) {
                                                                    echo '<label class="label label-primary">Order Baru</label>';
                                                                } elseif ($item->STATUSORDER == 1) {
                                                                    echo '<label class="label label-warning">Sampel Diterima</label>';
                                                                } elseif ($item->STATUSORDER == 2) {
                                                                    echo '<label class="label label-success">Selesai</label>';
                                                                } elseif ($item->STATUSORDER == 3) {
                                                                    echo '<label class="label label-danger">Batal Order</label>';
                                                                }; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ORDA</td>
                                                        <td>: <?php if ($item->ORDA == 'N') {
                                                                    echo '<label class="label label-info">Tidak</label>';
                                                                } else {
                                                                    echo '<label class="label label-info">Ya</label>';
                                                                }; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Entri Hasil</h5>
                                                <div class="card-header-right">

                                                </div>
                                            </div>
                                            <div class="card-block myScroll">
                                                <table style="width: 100%;" class="table-bordered table-hover table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">PEMERIKSAAN</th>
                                                            <th class="text-center">HASIL</th>
                                                            <th class="text-center">METODE</th>
                                                            <th class="text-center">SATUAN</th>
                                                            <th class="text-center">NILAI NORMAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tampil-list">
                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <label for="Kesan">Kesan</label>
                            <textarea class="form-control" required name="kesan" id="kesan" style="width: 100%;" placeholder="Kesan..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mt-3">Validator I</label>
                                <input type="text" class="form-control" name="validatori" id="validatori" placeholder="Masukkan nama validator I" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mt-3">Validator II</label>
                                <input type="text" class="form-control" name="validatorii" id="validatorii" placeholder="Masukkan nama validator II" required>
                            </div>
                        </div>
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
    function GetHapuspemeriksaanOrderById(IDORDER) {
        Swal.fire({
            title: 'Yakin ingin menghapus ?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('laboratoriumpk/HapusPemeriksaanOrderById') ?>",
                    data: {
                        idorder: IDORDER
                    },
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',

                        })
                        ListOrder(null, false);
                    }
                });

            }
        })


    }

    function ListOrder() {
        var getNoOrder = $('#norder_labpk').val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('laboratoriumpk/DataOrderByNorder') ?>",
            data: {
                noorderlpk: getNoOrder
            },
            dataType: "json",

            success: function(response) {
                $('.tampil-list').html(response.data)
            },
            error: function(data) {
                $('.tampil-list').html(data);
                console.log("error");
            }
        });
    }

    $(document).ready(function() {

        ListOrder();
    });

    $('.formSimpanHasilOrderLabPk').submit(function(e) {
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
            success: function(response, sukses) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: response.sukses,
                    icon: 'success'
                })
                $('#ModalProsesOrder').modal('hide');
                $('#torder_labpk').DataTable().ajax.reload(null, false);
            }
        });
        return false;
    })
</script>