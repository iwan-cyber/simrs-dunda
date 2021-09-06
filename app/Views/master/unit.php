<?php 

echo view('mega/box/css-dt');

?>

<!-- list css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('template/files/assets/pages/list-scroll/list.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('template/files/bower_components/stroll/css/stroll.css'); ?>">

        <div class="col-sm-12">
                <!-- List scroll card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Data Unit Layanan</h5>
                    </div>
                    <div class="row card-block">
                        <div class="col-md-6 col-lg-6">
                            <div class="card card-block user-card">
                                <button type="button" class="btn btn-primary btn-sm btn-block">DATA INSTALASI</button>
                                <ul class="scroll-list cards" id="list-instalasi">
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card card-block user-card">
                                <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal">Tambah Unit</button>
                                <ul class="scroll-list wave" id="list-unit"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List scroll card end -->
            </div>


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
            <input type="hidden" id="IDINSTALASI" name="IDINSTALASI">
            <div class="form-group">
                <label for="ID">ID Unit</label>
                <input type="text" class="form-control" id="ID" name="ID" aria-describedby="id ruangan" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="NAMA_UNIT_LAYANAN">Nama Unit</label>
                <input type="text" class="form-control" id="NAMA_UNIT_LAYANAN" name="NAMA_UNIT_LAYANAN">
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


<!-- list-scroll js -->
<script src="<?= base_url('template/files/bower_components/stroll/js/stroll.js'); ?>"></script>
<script src="<?= base_url('template/files/assets/pages/list-scroll/list-custom.js'); ?>"></script>

<script>
    const url = '<?= base_url('master/unit'); ?>';
    const url_instalasi = '<?= base_url('master/instalasi'); ?>';
</script>
<script src="<?= base_url('app/master/unit.js?'.rand()); ?>"></script>