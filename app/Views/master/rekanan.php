<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Rekanan</h5>
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
                                    <th>ID</th>
                                    <th>REKANAN</th>
                                    <th>ALAMAT</th>
                                    <th>JENIS</th>
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
  <div class="modal-dialog modal-lg">
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
                <label for="ID_REKANAN">ID REKANAN</label>
                <input type="text" class="form-control" id="ID_REKANAN" name="ID_REKANAN" aria-describedby="id rekanan" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="REKANAN">REKANAN</label>
                <input type="text" class="form-control" id="REKANAN" name="REKANAN" aria-describedby="kode rekanan" placeholder="Ketik Kode PPK">
            </div>
            <div class="form-group">
                <label for="ALAMAT">ALAMAT</label>
                <textarea class="form-control" id="ALAMAT" name="ALAMAT"></textarea>
            </div>
            <div class="form-group">
                <h4 class="sub-title">Jenis Rekanan</h4>
                <div class="form-radio">
                    
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" name="JENIS" id="JENIS" checked="checked">
                                <i class="helper"></i>Rekanan Farmasi
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" name="JENIS" id="JENIS">
                                <i class="helper"></i>Rekanan Gudang Barang
                            </label>
                        </div>
                </div>
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
    const url = '<?= base_url('master/rekanan'); ?>';
</script>
<script src="<?= base_url('app/master/rekanan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>