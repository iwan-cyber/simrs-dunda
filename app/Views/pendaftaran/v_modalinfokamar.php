<div class="modal fade" id="modalinfokamar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Info Kamar dan Bed</h5>
                <button type="button" class="btn btn-mini btn-out waves-effect waves-light btn-danger btn-square" data-dismiss="modal"><i class="fas fa-power-off"></i></button>
            </div>
            <div class="modal-body bg-info">
                <div class="row per-task-block">
                    <?php
                    $dataArr = json_decode($data);
                    $no = 1;
                    foreach ($dataArr->data as $item) { ?>

                        <input type="hidden" id="infokamar<?= $item->IDBED; ?>" value="<?= $item->KAMAR ?>">
                        <input type="hidden" id="infokelasbedbed<?= $item->IDBED; ?>" value="<?= $item->KELAS ?> - BED  <?= $item->NOBED ?>">
                        <div class="col-xl-3 col-md-6">
                            <a href="#" onclick="getkodebooking(<?= $item->IDBED; ?>)">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h6><i class="fas fa-bed"></i> Ruangan <?= $item->RUANGAN; ?> </h6>
                                        <div class="card-header-right">
                                            Rp. <?= $item->TARIF_INAP ?> / Hari
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td></td>
                                                <td rowspan="2" class="text-center">
                                                    <h3>BED <?= $item->NOBED ?></h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6><?= $item->KD_KAMAR ?> | <?= $item->KAMAR ?></h6>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span><?= $item->KELAS ?></span>
                                                </td>
                                                <td style="text-align: center;"><?php if ($item->STATUSKAMAR == "Kosong") {
                                                                                    echo '<label class="label label-danger">Kosong</label>';
                                                                                } elseif ($item->STATUSKAMAR == "Booking") {
                                                                                    echo '<label class="label label-info">Booking</label>';
                                                                                } elseif ($item->STATUSKAMAR == "Terisi") {
                                                                                    echo '<label class="label label-success">Terisi</label>';
                                                                                } ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php $no++;
                    } ?>
                </div>
            </div>
            <div class="modal-footer" style="background-color: grey;">

            </div>
        </div>
    </div>
</div>

<script>
    function getkodebooking(IDBED) {
        // var arr = $('#infokamar').serializeArray();
        var infokamar = document.getElementById('infokamar' + IDBED).value;
        var infobed = document.getElementById('infokelasbedbed' + IDBED).value;

        Swal.fire({
            html: 'Booking ' + infokamar + ' <br>' + infobed + '?<br>' + "Click YA, Jika tidak Click Batal!!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'YA!',
            cancelButtonText: 'Batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#modalinfokamar').modal('hide');
                Swal.fire(
                    '' + infokamar + '<br>' + infobed + '',
                    'Berhasil Dibooking! Silahkan daftarkan dan arahakan pasien ke ruangan tersebut!',
                    'success'
                )
            }
        })

    }
</script>