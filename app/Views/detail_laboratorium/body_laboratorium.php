<?php

use App\Controllers\Detailpasien;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <h5>Laboratorium</h5>
    <button class="btn btn-sm btn-primary" data-toggle="modal" onclick="orderlabpk('<?= $item->norm ?>')"><i class="far fa-file"></i> Order Baru</button>
    <hr />
    <table class="table table-responsive nowarp">
        <thead>
            <tr>
                <th>NO. REGISTER</th>
                <th>TGL/JAM. ORDER</th>
                <th>NOMR</th>
                <th>NAMA PASIEN</th>
                <th>DOKTER PENGIRIM</th>
                <th>STATUS ORDER</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NO. REGISTER</td>
                <td>TGL/JAM. ORDER</td>
                <td>NOMR</td>
                <td>NAMA PASIEN</td>
                <td>DOKTER PENGIRIM</td>
                <td>STATUS ORDER</td>
                <td>ACTION</td>
            </tr>
        </tbody>
    </table>

<?php } ?>
<div class="tampilmodal"></div>
<script>
    function orderlabpk(norm) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url('Laboratoriumpk/form_order'); ?>",
            data: {
                "norm": norm,
            },
            // dataType: 'json',
            success: function(response) {
                $('.tampilmodal').html(response);
                $('#modalOrderLabPk').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

            }
        });
    }
</script>