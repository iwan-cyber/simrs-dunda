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

    <div class="modal fade" id="ModalCetakHasil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-file-alt"></i> Cetak Hasil No: <?= $item->NOORDER; ?></h5>
                    <table>
                        <tr>
                            <td>
                                <button type="button" onclick="printDiv('print_01')" class="btn btn-sm btn-primary btn-block btn-cetak"><i class="ti-printer"></i> Cetak</button>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body bg-white my_print" id="print_01">
                    <table style="width: 100%;">
                        <tr>
                            <td class="text-center">
                                <font style="font-size: 20px; font-weight: bold;">INSTALASI RADIOLOGI</font><br />
                                <font style="font-size: 16px; font-weight: bold;">RSUD Dr. M.M DUNDA LIMBOTO</font><br />
                                <font style="font-size: 16px; font-weight: bold;">KABUPATEN GORONTALO</font><br />
                                Jl. Achmad A. Wahab No. 51 Telp (0435) 881455 Fax (0435) 881095
                            </td>
                        </tr>
                    </table>
                    <hr style="border-style: solid;">
                    <table style="width: 100%;">
                        <tr>
                            <td class="text-center">
                                <font style="font-size: 16px; font-weight: bold;">HASIL PEMERIKSAAN</font><br />
                                <font style="font-size: 12px;"><?= $item->NOORDER; ?></font><br />
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <table class="display" style="width: 100%;">
                                            <tr>
                                                <td style="font-weight: bold;">NOMR</td>
                                                <td style="font-weight: bold;">: <?= $item->NORM; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Pasien</td>
                                                <td style="font-weight: bold;">: <?= $item->NAMA; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>: <?= date('d F Y', strtotime($item->TGL_LAHIR)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>: <?php if ($item->JENKEL == 'l') {
                                                            echo "Laki-laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        }; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Penjamin</td>
                                                <td>: <?= $item->PENJAMIN; ?> </td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td>

                                        <table class="display" style="width: 100%;">
                                            <tr>
                                                <td>Dokter Pengirim</td>
                                                <td>: <?= $item->DOKTERPENGIRIM; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Departemen</td>
                                                <td>: RSUD Dr. M.M. Dunda Limboto </td>
                                            </tr>
                                            <tr>
                                                <td>Unit/Ruangan Asal</td>
                                                <td>: <?= $item->RUANGAN; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Permintaan</td>
                                                <td>: <?= date('d F Y', strtotime($item->TGLORDER)); ?> / <?= $item->JAMORDER; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Hasil</td>
                                                <td>: <?= date('d F Y', strtotime($item->HASILTGL)); ?> / <?= $item->HASILJAM; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <p>YTH, TS. <br>
                                <b style="font-weight: bold;">Telah dilakukan pemeriksaan dengan hasil sebagai berikut:</b>
                            </p>
                            <table class="table display nowrap tampil-list" style="width: 100%;">
                            </table>
                        </div>

                        <div class="col-md-12">
                            <center>
                                <p style="font-weight: bold;">BTK Wassalam,</p>
                                <br>
                                <br>
                                <br>
                                <p style="font-weight: bold;"><?= $item->DOKTER_PEMERIKSA; ?></p>
                            </center>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-info">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?= $item->NOORDER ?>" id="norder_rad">
<?php } ?>

<script>
    $(document).ready(function() {
        ListOrder();
    });

    function ListOrder() {
        var getNoOrder = $('#norder_rad').val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('radiologi/DataHasilOrderByNorder') ?>",
            data: {
                norderrad: getNoOrder
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
                // $('#modalOrderLabPk').modal('hide');
                // $('#torder_labpk').DataTable().ajax.reload(null, false);
            }
        });
        return false;
    })
</script>