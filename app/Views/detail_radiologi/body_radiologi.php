<?php

use App\Controllers\Detailpasien;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>


    <h4>RIWAYAT ORDER RADIOLOGI</h4>

    <button class="btn btn-sm btn-primary" data-toggle="modal" onclick="orderrad('<?= $item->nopen ?>')">Order Baru</button>

    <table class="table table-bordered table-hover nowarp" id="torder_rad" style="width: 100%;">
        <thead>
            <tr>
                <th>NO.REGISTER</th>
                <th>NO.KUNJUNGAN</th>
                <th>TGL.ORDER</th>
                <th>JAM ORDER</th>
                <th>DOK.PENGIRIM</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
    </table>

    <input type="hidden" id="id_norm" value="<?= $item->norm ?>">
<?php } ?>

<div class="tampilmodal"></div>
<script>
    function orderrad(nopen) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Radiologi/form_order'); ?>",
            data: {
                "nopen": nopen,
            },
            // dataType: 'json',
            success: function(response) {
                $('.tampilmodal').html(response);
                $('#modalOrderRad').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

            }
        });

    }

    function ProsesOrder(NOORDER) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Radiologi/form_entri_hasil'); ?>",
            data: {
                "norder": NOORDER,
            },
            // dataType: 'json',
            success: function(response) {
                $('.tampilmodal').html(response);
                $('#ModalProsesOrder').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

            }
        });
    }

    function BatalOrder(NOORDER) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            html: "Anda akan membatalkan nomor order <br><b>" + NOORDER + "</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('Radiologi/BatalkanOrderByNoOrder'); ?>",
                    data: {
                        noorder: NOORDER
                    },
                    success: function(response, sukses) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success'
                        })
                    }
                });

            }
        })
    }

    function cetakHasil(NOORDER) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('radiologi/cetakhasil'); ?>",
            data: {
                "norder": NOORDER,
            },
            // dataType: 'json',
            success: function(response) {
                $('.tampilmodal').html(response);
                $('#ModalCetakHasil').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

            }
        });
    }


    $(document).ready(function() {
        var getnorm = $('#id_norm').val();
        $('#torder_rad').DataTable({
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
                url: '<?= base_url('Radiologi/TampilOrderRadByNorm'); ?>',
                data: {
                    norm: getnorm
                }
            },

            columns: [{
                    data: 'NOORDER',
                    name: 'NO_ORDER'

                }, {
                    data: 'NOPEN',
                    name: 'NOPEN'

                }, {
                    data: 'TANGGAL',
                    name: 'TANGGAL'
                },
                {
                    data: 'JAMORDER',
                    name: 'JAMORDER'
                }, {
                    data: 'NAMA_PEGAWAI',
                    name: 'NAMA_PEGAWAI'
                }, {
                    data: 'STATUS',
                    name: 'STATUS'
                }, {
                    data: 'aksi',
                    name: 'aksi'

                }
            ],
            scrollY: '50vh',
            scrollCollapse: true,

        });
    });
</script>