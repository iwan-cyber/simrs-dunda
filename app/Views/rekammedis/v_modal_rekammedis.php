<?php

use App\Controllers\Rekammedis;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="modal fade" id="modalrekammedis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rekam Medis</h5>
                    <table>
                        <tr>
                            <td>NOMR</td>
                            <td><input type="text" class="form-control-plaintext form-control-sm" value="<?= $item->norm; ?>" id="noMr" name="noMr"></td>
                            <td>JAM</td>
                            <td><input type="time" class="form-control-plaintext form-control-sm" value="<?= date("H:i:s"); ?>" id="namaPasien" name="namaPasien"></td>
                        </tr>
                        <tr>
                            <td>PASIEN</td>
                            <td><input type="text" class="form-control-plaintext form-control-sm" value="<?= $item->nama; ?>" id="user_session" name="user_session"></td>
                            <td>TANGGAL</td>
                            <td><input type="date" class="form-control-plaintext form-control-sm" value="<?= date('Y-m-d') ?>" id="tglFinal" name="tglFinal"></td>
                        </tr>
                        <tr>
                            <td>KEPESERTAAN</td>
                            <td><input type="text" class="form-control-plaintext form-control-sm" value="<?= $item->status; ?>" id="user_session" name="user_session"></td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <td>
                                <select class="form-select form-select-sm" id="statusFinalLayanan" name="statusFinalLayanan" aria-label=".form-select-sm example">
                                    <option value="" selected>- Pilih Status Final -</option>
                                    <option value="Kontrol">Pasien Kontrol</option>
                                    <option value="Pulang">Pasien Membaik</option>
                                    <option value="Inap">Lanjut Inap</option>
                                </select>
                            </td>
                            <td>
                                <div class="btn-group btn-final-layanan" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" id="finalLayanan" onclick="finalLayanan('<?= $item->nopen  ?>')" class="btn btn-out btn-sm waves-effect waves-light btn-primary btn-square"><i class="ti-check"></i> Final Pelayanan</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="modal-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item nav-item-mini">
                            <a class="nav-link active" data-toggle="tab" href="#rekamMedis" role="tab"><i class="ti-home"></i> Rekam Medis</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#resepElektronik" role="tab"><i class="ti-home"></i> Order Resep</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#radiologi" role="tab"><i class="ti-home"></i> Order Radiologi</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lab-pk" role="tab"><i class="ti-home"></i> Laboratorium Klinik</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lab-pa" role="tab"><i class="ti-home"></i> Laboratorium Anatomi</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#utd" role="tab"><i class="ti-home"></i> UTD</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="rekamMedis" role="tabpanel">
                            <p class="m-0">Rekam Medis - Dalam pengembangan</p>
                        </div>
                        <div class="tab-pane" id="resepElektronik" role="tabpanel">
                            <p class="m-0">RESEP - Dalam pengembangan</p>
                        </div>
                        <div class="tab-pane" id="radiologi" role="tabpanel">
                            <p class="m-0">RAD - Dalam pengembangan</p>
                        </div>
                        <div class="tab-pane" id="lab-pk" role="tabpanel">
                            <p class="m-0">LAB-PK - Dalam pengembangan</p>
                        </div>
                        <div class="tab-pane" id="lab-pa" role="tabpanel">
                            <p class="m-0">LAB-PA - Dalam pengembangan</p>
                        </div>
                        <div class="tab-pane" id="utd" role="tabpanel">
                            <p class="m-0">UTD - Dalam pengembangan</p>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

<?php } ?>


<script>
    function finalLayanan(NOPEN) {
        if ($('#statusFinalLayanan').val() == "") {
            Swal.fire('Anda belum menentukan Status Final Layanan!');
            $('#statusFinalLayanan').addClass('is-invalid');
            return false;
        }
        $('#statusFinalLayanan').removeClass('is-invalid');
        Swal.fire({
            title: 'Yakin Final Layanan?',
            text: "Anda akan memfinalkan layanan pada pasien ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('rekammedis/finallayanan') ?>",
                    data: {
                        nopen: NOPEN,
                        statusFinal: $('#statusFinalLayanan').val(),
                        tglFinal: $('#tglPel').val(),
                        jamFinal: $('#tglPel').val(),
                        sessionUser: $('#user_session').val()
                    },
                    // dataType: "dataType",
                    success: function(response) {
                        $('.btn-final-layanan').html(`<button type="button" id="selesaiLayanan" class="btn btn btn-out btn-danger btn-sm waves-effect" data-dismiss="modal">Tutup</button>`);
                        Swal.fire(
                            'Sukses!',
                            'Pelayanan medis selesai! Terima kasih.',
                            'success'
                        )
                        $('#dataPendaftaran').DataTable().ajax.reload();

                    }
                });

            }
        })

    }
</script>