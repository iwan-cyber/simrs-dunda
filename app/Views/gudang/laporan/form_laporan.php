<?= $this->extend('gudang/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Laporan Gudang</h5>
        </div><!-- card-header -->

        <div class="card-block">

<div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-masuk-tab" data-toggle="pill" href="#vert-tabs-masuk" role="tab" aria-controls="vert-tabs-masuk" aria-selected="true">A. Barang Masuk</a>
                  <a class="nav-link" id="vert-tabs-keluar-tab" data-toggle="pill" href="#vert-tabs-keluar" role="tab" aria-controls="vert-tabs-keluar" aria-selected="false">B. Barang Keluar</a>
                  <a class="nav-link" id="vert-tabs-stock-tab" data-toggle="pill" href="#vert-tabs-stock" role="tab" aria-controls="vert-tabs-stock" aria-selected="false">C. Stock</a>
                  <a class="nav-link" id="vert-tabs-mutasi-tab" data-toggle="pill" href="#vert-tabs-mutasi" role="tab" aria-controls="vert-tabs-mutasi" aria-selected="false">D. Mutasi</a>
                  <a class="nav-link" id="vert-tabs-saldo-tab" data-toggle="pill" href="#vert-tabs-saldo" role="tab" aria-controls="vert-tabs-saldo" aria-selected="false">E. Saldo</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-masuk" role="tabpanel" aria-labelledby="vert-tabs-masuk-tab">
                     <?= $this->include('gudang/laporan/tab/tab-masuk'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-keluar" role="tabpanel" aria-labelledby="vert-tabs-keluar-tab">
                     <?= $this->include('gudang/laporan/tab/tab-keluar'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-stock" role="tabpanel" aria-labelledby="vert-tabs-stock-tab">
                     <?= $this->include('gudang/laporan/tab/tab-stock'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-mutasi" role="tabpanel" aria-labelledby="vert-tabs-mutasi-tab">
                     <?= $this->include('gudang/laporan/tab/tab-mutasi'); ?>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-saldo" role="tabpanel" aria-labelledby="vert-tabs-saldo-tab">
                     <?= $this->include('gudang/laporan/tab/tab-saldo'); ?>
                  </div>
                </div>
              </div>
            </div>







        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('gudang/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>