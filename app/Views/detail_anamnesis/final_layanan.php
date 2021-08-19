<?php

use App\Controllers\Detailpasien;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Final Layanan</h5>
                    <div class="card-header-right">

                    </div>
                </div>
                <div class="card-body table-responsive">
                    <?= form_open('pendaftaran/finallayanan', ['class' => 'formfinal']); ?>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <table style="width: 100%;" class="table-bordered">
                                <tr style="background-color: #117A8B; color: white;">
                                    <td colspan="3" class=""><i class="fas fa-arrow-right"></i> PASIEN KELUAR</td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">Tanggal Keluar: </td>
                                    <td>
                                        <input type="date" id="tglkeluar" value="<?= date('Y-m-d'); ?>" name="tglpendaftaran" class="form-control form-control-sm input-danger" name="tglkeluar" id="tglkeluar" required>
                                    </td>
                                    <td>
                                        <input type="time" id="jamkeluar" name="jamkeluar" value="<?= date("H:i:s"); ?>" class="form-control form-control-sm input-danger" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">Cara Keluar: </td>
                                    <td colspan="2">
                                        <select class="form-control select2 form-control-sm" id="carakeluar" name="carakeluar" required>
                                            <option value="">Pilih</option>
                                            <option value="Diijinkan Pulang">Diijinkan Pulang</option>
                                            <option value="Pulang Paksa">Pulang Paksa</option>
                                            <option value="Dirujuk Ke RS Lain">Dirujuk Ke RS Lain</option>
                                            <option value="Lari">Lari</option>
                                            <option value="Pindah RS Lain">Pindah RS Lain</option>
                                            <option value="Meninggal">Meninggal</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">Diagnosa Akhir: </td>
                                    <td colspan="2">
                                        <input type="text" id="diagnosaakhir" name="diagnosaakhir" class="form-control form-control-sm input-danger" placeholder="Ketik diagnosa akhir..." required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">DPJP: </td>
                                    <td colspan="2">
                                        <select class="form-control select2 form-control-sm" id="dpjppulang" name="dpjppulang" required>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="tampil-isian-meninggal"></div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    function select2() {
        $('.select2').select2({
            onSelecting: true,
            allowClear: true,
            placeholder: '[ Pilih ]',
            theme: "classic",
            selectOnClose: true,
        })
    }

    $('.formfinal').submit(function(e) {
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
                    'Terdaftar!',
                    'Proses telah berhasil dilakukan!',
                    'success'
                )
                $('#ModalPendaftaran').modal('hide');
            }
        });
        return false;
    })

    $(document).ready(function() {
        select2();
    });

    $('#carakeluar').change(function() {
        var meninggal = $('#carakeluar').val();
        if (meninggal == 'Meninggal') {
            $('.tampil-isian-meninggal').html(`<table style="width: 100%;" class="table-bordered">
                                <tr style="background-color: #117A8B; color: white;">
                                    <td colspan="3" class=""><i class="fas fa-arrow-right"></i> PASIEN MENINGGAL</td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">Tanggal Meninggal: </td>
                                    <td>
                                        <input type="date" id="tglmeninggal" value="<?= date('Y-m-d'); ?>" name="tglpendaftaran" class="form-control form-control-sm input-danger" name="tglmeninggal" id="tglkeluar" required>
                                    </td>
                                    <td>
                                        <input type="time" id="jammeninggal" name="jammeninggal" value="<?= date("H:i:s"); ?>" class="form-control form-control-sm input-danger" required>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="text-right bg-info">Diagnosa Meninggal: </td>
                                    <td colspan="2">
                                        <input type="text" id="diagnosameninggal" name="diagnosameninggal" class="form-control form-control-sm input-danger" placeholder="Ketik diagnosa akhir..." required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right bg-info">DPJP: </td>
                                    <td colspan="2">
                                        <select class="form-control select2 form-control-sm" id="dpjpmeninggal" name="dpjpmeninggal" required>
                                        </select>
                                    </td>
                                </tr>
                            </table>`);
            select2();
            return false;
        }
        if (meninggal != 'Meninggal') {
            $('.tampil-isian-meninggal').html('')
            return false;
        }
    })

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