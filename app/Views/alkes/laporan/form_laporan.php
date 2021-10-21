<?= $this->extend('alkes/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Laporan Alat Kesehatan</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-pemeliharaan-tab" data-toggle="pill" href="#vert-tabs-pemeliharaan" role="tab" aria-controls="vert-tabs-pemeliharaan" aria-selected="true">Pemeliharaan</a>
                  <a class="nav-link" id="vert-tabs-perbaikan-tab" data-toggle="pill" href="#vert-tabs-perbaikan" role="tab" aria-controls="vert-tabs-perbaikan" aria-selected="false">Perbaikan</a>
                  <a class="nav-link" id="vert-tabs-kalibrasi-tab" data-toggle="pill" href="#vert-tabs-kalibrasi" role="tab" aria-controls="vert-tabs-kalibrasi" aria-selected="false">Kalibrasi</a>
                  <a class="nav-link" id="vert-tabs-inventeris-tab" data-toggle="pill" href="#vert-tabs-inventeris" role="tab" aria-controls="vert-tabs-inventeris" aria-selected="false">Inventaris</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-pemeliharaan" role="tabpanel" aria-labelledby="vert-tabs-pemeliharaan-tab">
                     <?= $this->include('alkes/laporan/tab/tab-pemeliharaan'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-perbaikan" role="tabpanel" aria-labelledby="vert-tabs-perbaikan-tab">
                     <?= $this->include('alkes/laporan/tab/tab-perbaikan'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-kalibrasi" role="tabpanel" aria-labelledby="vert-tabs-kalibrasi-tab">
                     <?= $this->include('alkes/laporan/tab/tab-kalibrasi'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-inventeris" role="tabpanel" aria-labelledby="vert-tabs-inventeris-tab">
                     <?= $this->include('alkes/laporan/tab/tab-inventaris'); ?>
                  </div>
                </div>
              </div>
            </div>







        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('alkes/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>