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
    $(document).ready(function() {
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

        });
    });
</script>