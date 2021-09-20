<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Profesi Pegawai</h5>
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
                <div class="col-sm-12">
                    <select class="form-control" id="KELOMPOK_PEGAWAI" name="KELOMPOK_PEGAWAI" onchange="getPegawaiByProfesi()">
                        <option value=""> -- Pilih Kelompok pegawai --</option>
                        <?php

                            foreach($KELOMPOK as $key=>$value) {

                                echo '<option value="'.$value['ID'].'">'.$value['KELOMPOK_PEGAWAI'].'</option>';
                            }

                        ?>

                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact dataTable table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA PEGAWAI</th>
                                    <th>PROFESI</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody id="list-pegawai"></tbody>
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
                <label for="ID">NAMA PEGAWAI</label>
                <select type="text" class="form-control" id="ID" name="ID">
                    <option value=""> Pilih Pegawai</option>
                    <?php

                        foreach($PEGAWAI as $key=>$value) {
                            echo '<option value="'.$value['ID'].'">'.$value['NAMA_PEGAWAI'].'</option>';
                        }

                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="IDKELOMPOK_PEGAWAI">PROFESI PEGAWAI</label>
                <select type="text" class="form-control" id="IDKELOMPOK_PEGAWAI" name="IDKELOMPOK_PEGAWAI">
                    <option value=""> Pilih Profesi</option>
                    <?php

                            foreach($KELOMPOK as $key=>$value) {

                                echo '<option value="'.$value['ID'].'">'.$value['KELOMPOK_PEGAWAI'].'</option>';
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
    const url = '<?= base_url('master/pegawai/profesi'); ?>';
</script>
<script src="<?= base_url('app/master/pegawaiProfesi.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>