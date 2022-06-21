<?= $this->extend('farmasi/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Stock</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                

            <div class="col-md-11">
                <div class="form-group">
                    <label for="UNIT" class="control-label">UNIT</label>
                    <select class="form-control form-control-sm" id="KODE_UNIT" name="KODE_UNIT" required>
                        <?php //echo getUnitFarmasiGroup($connect, 3); ?>
                    </select>
                </div>
            </div><!-- col-md-6 -->

            <div class="col-sm-1">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-primary btn-block btn-sm" id="load" onclick="Entri.refresh()"><i class="fas fa-rocket"></i> Ambil</button>
                </div>
            </div>
                    

            </div><!-- row -->




            <div class="row">
                <div class="col-md-12">

                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact table-striped" id="table">
                            <thead>
                                <tr>
            <th style="text-align:center; vertical-align:middle; width: 10%">KODE OBAT</th>
                        <th style="text-align:center; vertical-align:middle; width: 70%">NAMA</th>
                        <th style="text-align:center; vertical-align:middle; width: 10%;">STOCK</th>
                        <th style="text-align:center; vertical-align:middle; width: 10%">EDIT</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div><!-- col-md-12-->

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