<?= $this->extend('farmasi/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Rekapitulasi</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                

                  <div class="col-md-2">
                    <label for="bulan">Bulan</label>
                    <select class="form-control form-control-sm" id="bulan" name="bulan" required>
                      <option value="0">-- Pilih Bulan --</option>
                      <?php //optBulan($bulan); ?>
                    </select>
                  </div>

                  <div class="col-md-2">
                    <label for="tahun">Tahun</label>
                    <select class="form-control form-control-sm" id="tahun" name="tahun" required>
                      <option value="">-- pilih tahun --</option>
                      <?php //optTahun(3,3, $tahun); ?>
                    </select>
                  </div>

                  <div class="col-md-2">
                    <label style="color:white">Tahun</label>
                    <button type="button" onclick="load_data()" class="btn btn-success btn-sm btn-block" id="load">
                      <i class="fa fa-fw fa-arrow-circle-down"> </i>AMBIL
                    </button>
                  </div>

                    

            </div><!-- row -->


        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('mega/horizontal/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>