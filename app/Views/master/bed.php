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
                        <h5>Data Kamar</h5>
                    </div>
                    <div class="card-block">

                        <div class="row">
                            
                            <div class="col-sm-4">
                                <select class="form-control form-control-default form-control-sm" id="UNIT" name="UNIT" onchange="getRuangan()">
                                    <option value="">Pilih Unit</option>
                                    <?php 

                                        foreach ($UNIT as $key => $value) {
                                            echo '<option value="' . $value['ID'] . '">' . $value['NAMA_UNIT_LAYANAN'] . '</option>';
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control form-control-default form-control-sm" id="RUANGAN" name="RUANGAN" onChange="getKamar()">
                                    <option value="">Pilih Ruangan</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="form-control form-control-default form-control-sm" id="IDKAMAR" name="IDKAMAR" onChange="getBed()">
                                    <option value="">Pilih Kamar</option>
                                </select>
                            </div>

                        </div><!-- row -->

                        <div class="row">

                            <div class="col-md-12">

                                <div class="dt-responsive table-responsive">
                                    <table class="table table-bordered compact dataTable table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>KODE BED</th>
                                                <th>NO BED</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-bed"></tbody>
                                    </table>
                                    <button type="button" id="btnSimpan" class="btn btn-primary" style="display:  none" data-toggle="modal" data-target="#modal" >Tambah Data</button>
                                </div>

                            </div><!-- col-md-12-->

                        </div><!-- row -->

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
            <div class="form-group">
                <label for="ID">ID Bed</label>
                <input type="text" class="form-control" id="ID" name="ID" aria-describedby="id ruangan" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="KODE_BED">Kode Bed</label>
                <input type="text" class="form-control" id="KODE_BED" name="KODE_BED" placeholder="Ketik Kode Bed">
            </div>
            <div class="form-group">
                <label for="NO_BED">No Bed</label>
                <input type="text" class="form-control" id="NO_BED" name="NO_BED" placeholder="Ketik No Bed">
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
    const url = '<?= base_url('master/bed'); ?>';
    const url_unit = '<?= base_url('master/unit'); ?>';
    const url_ruangan = '<?= base_url('master/ruangan'); ?>';
</script>
<script src="<?= base_url('app/master/bed.js?'.rand()); ?>"></script>