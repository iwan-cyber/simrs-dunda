<div class="card-header">
    <h5>ANAMNESIS</h5>
</div>
<!-- Nav tabs -->
<ul class="nav nav-tabs  tabs" role="tablist">
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info active show" data-toggle="tab" href="#anam_umum" role="tab" aria-selected="false">UMUM</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_riwayat" role="tab" aria-selected="true">RIWAYAT</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_keluhan" role="tab" aria-selected="false">KELUHAN UTAMA</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_status" role="tab" aria-selected="false">STATUS FUNGSIONAL</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_kondisi" role="tab" aria-selected="false">KONDISI SOSIAL & PSIKOSOSIAL</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_edukasi" role="tab" aria-selected="false">EDUKASI PASIEN DAN KELUARGA</a>
    </li>
    <li class="nav-item" style="background-color: #916057;">
        <a class="nav-link btn btn-sm btn-info" data-toggle="tab" href="#anam_gizi" role="tab" aria-selected="false">PERMASALAHAN GIZI</a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content tabs card-block bg-info" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap;">
    <div class="tab-pane active show" id="anam_umum" role="tabpanel">
        <div class="table-responsive dt-responsive">
            <div class="header-right">
                <button class="btn btn-mini btn-primary">Tambah</button>
            </div>
            <hr />
            Histori disini
            <!-- <table id="tb-anam-umum" class="display" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>NOPEN/TANGGAL</th>
                        <th>JAM</th>
                        <th>HASIL</th>
                        <th>PARAMEDIS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>NOPEN/TANGGAL</th>
                        <th>JAM</th>
                        <th>HASIL</th>
                        <th>PARAMEDIS</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
            </table> -->
        </div>
    </div>
    <div class="tab-pane" id="anam_riwayat" role="tabpanel">
        <textarea class="form-control text-area" placeholder="Riwayat Umum...." style="height: 236px"></textarea>
    </div>
    <div class="tab-pane" id="anam_keluhan" role="tabpanel">
        <p class="m-0">
        <h6>Keluhan</h6>
        </p>
    </div>
    <div class="tab-pane" id="anam_status" role="tabpanel">
        <p class="m-0">
        <h6>Status</h6>
        </p>
    </div>
    <div class="tab-pane" id="anam_kondisi" role="tabpanel">
        <p class="m-0">
        <h6>Kondisi</h6>
        </p>
    </div>
    <div class="tab-pane" id="anam_edukasi" role="tabpanel">
        <p class="m-0">
        <h6>Edukasi</h6>
        </p>
    </div>
    <div class="tab-pane" id="anam_gizi" role="tabpanel">
        <p class="m-0">
        <h6>Gizi</h6>
        </p>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tb-anam-umum').DataTable({
            responsive: true,
            destroy: true,
            processing: true,
        });

    });
</script>