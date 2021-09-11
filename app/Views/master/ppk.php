<?php 

echo view('mega/box/css-dt');

?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>PPK</h5>
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
                                    <th>KODE PPK</th>
                                    <th>NAMA PPK</th>
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
                <label for="ID">ID</label>
                <input type="text" class="form-control" id="ID" name="ID" aria-describedby="id ppk" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="KODE_PPK">KODE_PPK</label>
                <input type="text" class="form-control" id="KODE_PPK" name="KODE_PPK" aria-describedby="kode ppk" placeholder="Ketik Kode PPK">
            </div>
            <div class="form-group">
                <label for="NAMA_PPK">NAMA_PPK</label>
                <input type="text" class="form-control" id="NAMA_PPK" name="NAMA_PPK" placeholder="Ketik PPK">
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
    const url = '<?= base_url('master/ppk'); ?>';
</script>
<script src="<?= base_url('app/master/ppk.js?'.rand()); ?>"></script>