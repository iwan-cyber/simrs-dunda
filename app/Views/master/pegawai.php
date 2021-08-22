<?php 

echo view('mega/box/css-dt');

?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Pegawai</h5>
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
                        <table class="table table-bordered compact dataTable table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>NAMA PEGAWAI</th>
                                    <th>JENKEL</th>
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
                <label for="ID">ID Pegawai</label>
                <input type="text" class="form-control" id="ID" name="ID" aria-describedby="id pegawai" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" class="form-control" id="NIK" name="NIK" aria-describedby="Nik pegawai" placeholder="isikan NIK Pegawai">
            </div>
            <div class="form-group">
                <label for="NAMA_PEGAWAI">Nama Pegawai</label>
                <input type="text" class="form-control" id="NAMA_PEGAWAI" name="NAMA_PEGAWAI" placeholder="Ketik Nama Pegawai">
            </div>
            <div class="form-group">
                <label for="NIP">NIP</label>
                <input type="text" class="form-control" id="NIP" name="NIP" placeholder="Ketik NIP Pegawai">
            </div>
            <div class="form-group">
                <label for="JENKEL">Unit Layanan</label>
                <select type="text" class="form-control" id="JENKEL" name="JENKEL">
                    <option value=""> Pilih Jenis Kelamin</option>
                    <option value="L"> Laki - Laki</option>
                    <option value="P"> Perempuan</option>
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


<?php echo view("mega/box/script"); ?>

<?php echo view("mega/box/script-dt"); ?>




<script>
    const url = '<?= base_url('master/pegawai'); ?>';
</script>
<script src="<?= base_url('app/master/pegawai.js?'.rand()); ?>"></script>