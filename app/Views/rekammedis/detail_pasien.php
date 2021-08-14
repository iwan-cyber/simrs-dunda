<?php

use App\Controllers\Rekammedis;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">N. Rekam Medik Pasien : <?= $item->norm ?></div>
                <div class="card-body">
                    isi
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Info Pasien</div>
                <div class="card-body">
                    isi
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Info Pasien</div>
                <div class="card-body">
                    isi
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Info Pasien</div>
                <div class="card-body">
                    isi
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