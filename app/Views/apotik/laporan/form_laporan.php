<?= $this->extend('apotik/template'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Laporan</h5>
        </div><!-- card-header -->

        <div class="card-block">`

                    <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a  class="nav-link active" role="tab" data-toggle="pill" aria-selected="false" id="daftar-resep" href="#daftar-resep-tab" aria-controls="daftar-resep-tab" >A. Daftar Resep</a>
                  <a class="nav-link" role="tab" aria-selected="false" data-toggle="pill" id="resep-pasien" href="#resep-pasien-tab" aria-controls="resep-pasien-tab" >B. Resep Pasien</a>
                   <a class="nav-link"  aria-selected="false" role="tab"  data-toggle="pill" id="rekap-obat" href="#rekap-obat-tab" aria-controls="rekap-obat-tab">C. Rekap Obat </a>
                   <a class="nav-link"  role="tab" data-toggle="pill" id="obat-keluar" href="#obat-keluar-tab" aria-controls="obat-keluar" aria-selected="true">D. Jumlah Obat Keluar</a>
                  <a class="nav-link"  role="tab" data-toggle="pill" id="orda" href="#orda-tab" aria-controls="orda" aria-selected="true">E. Resep Penjamin</a>
                  <a class="nav-link"  role="tab" data-toggle="pill" id="copy" href="#copy-tab" aria-controls="copy" aria-selected="true">G. Copy Resep</a>
                  <a class="nav-link"  role="tab" data-toggle="pill" id="umum" href="#umum-tab" aria-controls="umum" aria-selected="true">H. Pembayaran Umum</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane active show" id="daftar-resep-tab" role="tabpanel" aria-labelledby="daftar-resep">
                            <?= $this->include("apotik/laporan/form/daftar-resep"); ?>
                        </div>
                        <div class="tab-pane fade" id="resep-pasien-tab" role="tabpanel" aria-labelledby="resep-pasien">
                            <?= $this->include("apotik/laporan/form/resep-pasien"); ?>
                        </div>
                        <div class="tab-pane fade" id="rekap-obat-tab" role="tabpanel" aria-labelledby="rekap-obat">
                            <?= $this->include("apotik/laporan/form/rekap-obat"); ?>
                        </div>
                        <div class="tab-pane fade" id="obat-keluar-tab" role="tabpanel" aria-labelledby="obat-keluar">
                            <?= $this->include("apotik/laporan/form/obat-keluar"); ?>
                        </div>
                        <div class="tab-pane fade" id="orda-tab" role="tabpanel" aria-labelledby="orda">
                            <?= $this->include("apotik/laporan/form/orda"); ?>
                        </div>
                        <div class="tab-pane fade" id="copy-tab" role="tabpanel" aria-labelledby="copy">
                            <?= $this->include("apotik/laporan/form/copy-resep"); ?>
                        </div>
                        <div class="tab-pane fade" id="umum-tab" role="tabpanel" aria-labelledby="umum">
                            <?= $this->include("apotik/laporan/form/umum"); ?>
                        </div>
                    </div>
              </div>
            </div>

        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('apotik/script'); ?>

<script>
    const url = '<?= base_url('farmasi/pengeluaran'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>