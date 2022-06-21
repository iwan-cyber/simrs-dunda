<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>
<!-- list css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('template/files/assets/pages/list-scroll/list.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('template/files/bower_components/stroll/css/stroll.css'); ?>">

        <div class="col-sm-12">
                <!-- List scroll card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Data Item Obat</h5>
                                    <div class="card-header-right">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Tambah Data</button>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div>
                    </div>
                    <div class="card-block">

                        <div class="row">
                            
                        </div><!-- row -->

                        <div class="row">

                            <div class="col-md-12">

                                  <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact dataTable table-striped" id="table">

                                    <thead>
                                      <tr>
                                        <th>Kode Item</th>
                                        <th>Nama Item</th>
                                        <th>Jenis</th>
                                        <th>x</th>
                                      </tr>
                                    </thead>

                                    <tfoot>
                                      <tr>
                                        <th>Kode Item</th>
                                        <th>Nama Item</th>
                                        <th>Jenis</th>
                                        <th>x</th>
                                      </tr>
                                    </tfoot>
                                    <tbody></tbody>

                                  </table>

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
                <label for="ID">ID Item</label>
                <input type="text" class="form-control" id="ID" name="ID" aria-describedby="id ruangan" placeholder="Otomatis" readonly="">
            </div>
            
            <div class="form-group">
                <label for="KODE_ITEM">Kode Item</label>
                <input type="text" class="form-control" id="KODE_ITEM" name="KODE_ITEM" aria-describedby="kode item" placeholder="Otomatis" readonly="">
            </div>

            <div class="form-group">
                <label for="NAMA_ITEM">Nama Item</label>
                <input type="text" class="form-control" id="NAMA_ITEM" name="NAMA_ITEM" aria-describedby="nama item" placeholder="Otomatis" readonly="">
            </div>

            <div class="form-group">
                <label for="JENIS">Jenis</label>
                <select class="form-control" id="JENIS" name="JENIS">
                    <option value=""> -- Pilih Jenis --</option>
                    <option value="OBAT">OBAT</option>
                    <option value="JENIS">JENIS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="SAT_BESAR">Sat Besar</label>
                <select class="form-control" id="SAT_BESAR" name="SAT_BESAR">
                    <option value=""> -- Pilih Jenis --</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="SAT_KECIL">Sat Kecil</label>
                <select class="form-control" id="SAT_KECIL" name="SAT_KECIL">
                    <option value=""> -- Pilih Jenis --</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="IDKELAS">Kelas</label>
                <select class="form-control" id="IDKELAS" name="IDKELAS">
                    <option value=""> -- Pilih Kelas --</option>
                    <?php

                        // foreach ($KELAS as $key => $value) {
                        //     echo '<option value="' . $value['ID'] . '">' . $value['KELAS'] . '</option>';
                        // }

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


<!-- list-scroll js -->
<script src="<?= base_url('template/files/bower_components/stroll/js/stroll.js'); ?>"></script>
<script src="<?= base_url('template/files/assets/pages/list-scroll/list-custom.js'); ?>"></script>

<script>
    const url = '<?= base_url('master/item'); ?>';
</script>
<script src="<?= base_url('app/master/item.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>