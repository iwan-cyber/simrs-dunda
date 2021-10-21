<?= $this->extend('gudang/template'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Form Barang Masuk</h5>
        </div><!-- card-header -->

        <div class="card-block">`

            <?= $this->include('gudang/masuk/tambah/data'); ?>

            <?= $this->include('gudang/masuk/tambah/form'); ?>

            <?= $this->include('gudang/masuk/tambah/modal-simpan'); ?>

        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->




<?= $this->include('gudang/script'); ?>


<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>