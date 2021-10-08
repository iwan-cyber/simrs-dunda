<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>


<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Master Data</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                <div class="col-md-12">


                </div><!-- col-md-12-->

            </div><!-- row -->

        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('mega/horizontal/script'); ?>


<!-- list-scroll js -->
<script src="<?= base_url('template/files/bower_components/stroll/js/stroll.js'); ?>"></script>
<script src="<?= base_url('template/files/assets/pages/list-scroll/list-custom.js'); ?>"></script>

<script>
    
</script>

<?= $this->endSection(); ?>