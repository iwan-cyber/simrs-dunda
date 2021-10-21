<?= $this->extend('apotik/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Transaksi</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                

                  <div class="col-md-8">
                    <label class="control-label">Jenis Transaksi</label>
                    <select class="form-control form-control-sm" id="jenis" name="jenis">
                      <option value="masuk">Barang Masuk</option>
                      <option value="keluar">Barang Keluar</option>
                    </select>

                  </div>

                  <div class="col-md-2">
                    <label class="control-label">Dari Tanggal</label>
                    <input class="form-control form-control-sm tanggal" id="tgl_awal" type="text" value="<?php echo date("01-m-Y"); ?>" name="tgl_awal" size="10">
                  </div>

                  <div class="col-md-2">
                    <label class="control-label">Sampai Dengan</label>
                    <input class="form-control form-control-sm tanggal" id="tgl_akhir" type="text" value="<?php echo date("d-m-Y"); ?>" name="tgl_akhir" size="10">
                  </div>

                    

            </div><!-- row -->


        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('apotik/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('apotik/penerimaan'); ?>';
</script>
<script src="<?= base_url('apotik/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>