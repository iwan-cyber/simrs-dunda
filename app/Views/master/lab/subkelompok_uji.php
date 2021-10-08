<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Sub Kelompok Uji Laboratorium</h5>
            <div class="card-header-right">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Tambah Data</button>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                <div class="col-md-12">

                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>ID SUB</th>
                                    <th>NAMA SUB</th>
                                    <th>KELOMPOK</th>
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


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form">
            <div class="form-group">
                <label for="ID_SUB">ID SUB</label>
                <input type="text" class="form-control" id="ID_SUB" name="" aria-describedby="id sub" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="NAMA_SUB">NAMA SUBKELOMPOK</label>
                <input type="text" class="form-control" id="NAMA_SUB" name="NAMA_SUB" aria-describedby="Nama Kelompok" placeholder="Ketik Nama Kelompok">
            </div>
            <div class="form-group">
                <label for="ID_KELOMPOK">KELOMPOK</label>
                <select class="form-control form-control-sm" id="ID_KELOMPOK" name="ID_KELOMPOK">
                    <option value="">-- Pilih Kelompok --</option>
                    <?php 

                        foreach ($KELOMPOK_UJI as $key => $value) {

                            echo '<option value="'.$value['id_kelompok'].'">'.$value['nama_kelompok'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="simpan()" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>


<?= $this->include('mega/horizontal/script'); ?>
<?= $this->include('mega/horizontal/script-dt'); ?>



<script>
    const url = '<?= base_url('master/lab/subkelompokuji'); ?>';
</script>
<script src="<?= base_url('app/master/lab/subkelompok_uji.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>