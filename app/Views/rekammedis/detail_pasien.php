<?php

use App\Controllers\Rekammedis;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-right">
                        <table>
                            <tr>
                                <td>
                                    <h5 class="card-header-text"><?= $item->norm ?>| <?= $item->nama ?></h5>
                                </td>
                                <td><label class="label label-info">NOPEN: <?= $item->nopen ?></label></td>
                                <td><label class="label label-info">INSTALASI: <?= $item->nopen ?></label></td>
                                <td><label class="label label-info">UNIT LAYANAN: <?= $item->nopen ?></label></td>
                                <td><label class="label label-info">RUANGAN: <?= $item->nopen ?></label></td>
                                <td><label class="label label-info">DPJP: <?= $item->nopen ?></label></td>
                                <td><label class="label label-info">STATUS: <?= $item->nopen ?></label></td>
                            </tr>
                        </table>
                        <hr />
                    </div>

                </div>
                <div class="table-responsive">
                    <table style="width: 100%;">
                        <tr>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien bg-info" onclick="btn_tab_rekamedis('<?= $item->nopen ?>')"><i class="fas fa-notes-medical"></i> REKAM MEDIS </button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_laboratorium()"><i class="fas fa-microscope"></i> LABORATORIUM</button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_radiologi()"><i class="fas fa-x-ray"></i> RADIOLOGI</button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_utd()"><i class="fas fa-heartbeat"></i> UTDRS</button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_ok()"><i class="fas fa-procedures"></i> KAMAR OPERASI</button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_mutasi()"><i class="fas fa-arrows-alt-v"></i> MUTASI</button></td>
                            <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-pasien" onclick="btn_tab_riwayat()"><i class="far fa-folder-open"></i> RIWAYAT/STATUS</button></td>
                        </tr>
                    </table>
                </div>
                <div class="card-body card-body-anamnesis"></div>
            </div>
        </div>

    </div>
<?php } ?>


<script>
    $('.btn-tab-pasien').click(function() {
        $('.btn-tab-pasien').removeClass('bg-info');
        $(this).addClass('bg-info');
    })
</script>