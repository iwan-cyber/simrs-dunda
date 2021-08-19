<?php

use App\Controllers\Detailpasien;

$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="row">

        <div class="col-lg-3 col-md-12">
            <div class="btn-group " role="group">
                <button type="button" onclick="btn_anamnesa()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left bg-info"><i class="fas fa-edit"></i> ANAMNESIS</button>
                <button type="button" onclick="btn_pemeriksaan()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> PEMERIKSAAN UMUM DAN FISIK</button>
                <button type="button" onclick="btn_penilaian()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> PENILAIAN</button>
                <button type="button" onclick="btn_icd()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> ICD</button>
                <button type="button" onclick="btn_perencanaan()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> PERENCANAAN</button>
                <button type="button" onclick="btn_cppt()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> CPPT</button>
                <button type="button" onclick="btn_layanan()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> LAYANAN TINDAKAN</button>
                <button type="button" onclick="btn_eresep()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> E-RESEP</button>
                <button type="button" onclick="btn_konsul()" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> KONSUL</button>
                <button type="button" onclick="btn_final('<?= $item->nopen; ?>')" class="btn waves-effect btn-sm waves-light btn-pinterest btn-block text-left"><i class="fas fa-edit"></i> Final</button>
            </div>
        </div>
        <div class="col-lg-9 col-md-12 area-input-rekam-medis" style="display: none;">

        </div>
    </div>
<?php } ?>
<script>
    $('.btn-pinterest').click(function() {
        $('.btn-pinterest').removeClass('bg-info');
        $(this).addClass('bg-info');
    })
</script>