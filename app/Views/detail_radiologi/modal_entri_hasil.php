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
    <?= form_open('Radiologi/SimpanHasilOrder', ['class' => 'formSimpanHasilOrderRad']); ?>
    <div class="modal fade" id="ModalProsesOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-file"></i> Entri Hasil Radiologi No. <?= $item->NOORDER; ?></h5>
                    <table>
                        <tr>
                            <td><input type="text" value="<?= $item->NOORDER; ?>" required id="norder_labrad" class="form-control form-control-sm input-danger" name="norder_labrad" readonly required></td>
                            <td><input type="date" value="<?= $item->TGLORDER; ?>" name="tgl_order" required class="form-control form-control-sm"></td>
                            <td><input type="time" value="<?= $item->JAMORDER; ?>" name="jam_order" required class="form-control form-control-sm"></td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-primary btn-block btn-simpan">Simpan</button>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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
                                    <td>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>Dokter Pemeriksa</td>
                                                <td>: <?= user()->fullname; ?> <input type="hidden" value="<?= user()->fullname; ?>" name="dok_pemeriksa"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr style="background-color: lightseagreen; color: white;">
                                                    <th class="text-center">INPUT HASIL</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tampil-list">
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label label-info">No. Foto</label>
                                        <input class="form-control" value="<?= $item->NOFOTO ?>" id="no_foto" name="no_foto" style="width: 100%;" placeholder="Nomor Foto..." required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label label-info">Kesan</label>
                                        <textarea class="form-control" id="kesan" name="kesan" style="width: 100%;" placeholder="Kesan..." required><?= $item->KESAN ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label label-info">Expertisi</label>
                                        <textarea class="form-control" id="expertisi" name="expertisi" style="width: 100%;" placeholder="Expertisi..." required><?= $item->EXPERTISI ?></textarea>
                                    </td>
                                </tr>
                            </table>
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

<script type="text/javascript" src="<?= base_url() ?>/template/files/assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('kesan', {
            filebrowserImageBrowseUrl: '<?php echo base_url('template/files/assets/kcfinder/browse.php'); ?>',
            height: '200px'
        });

        CKEDITOR.replace('expertisi', {
            filebrowserImageBrowseUrl: '<?php echo base_url('template/files/assets/kcfinder/browse.php'); ?>',
            height: '200px'
        });

        CKEDITOR.replace('ckeditor', {
            filebrowserImageBrowseUrl: '<?php echo base_url('template/files/assets/kcfinder/browse.php'); ?>',
            height: '200px'
        });
    });
</script>

<script>
    $(document).ready(function() {
        var getNoOrder = $('#norder_labrad').val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('radiologi/DataOrderByNorder') ?>",
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

        $('.formSimpanHasilOrderRad').submit(function(e) {
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
                    $('#modalOrderLabPk').modal('hide');
                    $('#torder_rad').DataTable().ajax.reload(null, false);
                }
            });
            return false;
        })
    });
</script>