<?= $this->extend('apotik/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Register Resep</h5>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                

                <div class="col-md-6">      
                    <label class="control-label" for="rekanan">Rekanan</label>
                    <select name="rekanan" id="rekanan" class="form-control form-control-sm select">
                        
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="control-label">Dari Tanggal</label>
                    <input class="form-control form-control-sm tanggal" id="tglawal" type="text" value="<?= date("01-m-Y"); ?>" name="tglawal" size="10">
                </div>

                <div class="col-md-2">
                    <label class="control-label" id="tgl_akhir">Sampai Dengan</label>
                    <input class="form-control form-control-sm tanggal" id="tglakhir" type="text" value="<?= date("d-m-Y"); ?>" name="tglakhir" size="10">
                </div>

                <div class="col-md-2">
                    <label class="control-label" style="color: white">Sampai Dengan</label>
                    <button type="button" id="cari" class="btn btn-success btn-sm btn-block" onclick="load_data()">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
                    

            </div><!-- row -->




            <div class="row">
                <div class="col-md-12">

                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact table-striped" id="table">
                            <thead>
                                <tr>
                                <th>Tanggal</th>
                                <th>No.Resep</th>
                                <th>Nama Pasien</th>
                                <th>Ruangan/Poli</th>
                                <th>Status</th>
                                    <th>#</th>
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

<?= $this->include('apotik/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>