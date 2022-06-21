<?= $this->extend('apotik/template'); ?>

<?= $this->section('content'); ?>


<?= $this->include('apotik/script'); ?>


<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>