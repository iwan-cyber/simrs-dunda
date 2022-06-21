<?= $this->extend('alkes/template'); ?>

<?= $this->section('content'); ?>


<?= $this->include('alkes/script'); ?>


<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>