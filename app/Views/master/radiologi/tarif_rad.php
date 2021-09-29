<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Tarif Radiologi</h5>
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
                                    <th>NAMA TINDAKAN</th>
                                    <th>3</th>
                                    <th>2</th>
                                    <th>1</th>
                                    <th>VIP</th>
                                    <th>VVIP</th>
                                    <th>ICU</th>
                                    <th>BPJS</th>
                                    <th>BPJS RI</th>
                                    <th>KATEGORI</th>
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

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="ID">ID</label>
                        <input type="text" class="form-control" id="ID" name="" aria-describedby="id tindakan" placeholder="Otomatis" readonly="">
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <label for="NAMA_TINDAKAN">NAMA TINDAKAN</label>
                        <input type="text" class="form-control" id="NAMA_TINDAKAN" name="NAMA_TINDAKAN" aria-describedby="Nama Tindakan" placeholder="Ketik Tarif">
                    </div>
                </div>
            </div><!-- row -->

            <div class="row">
                
                <div class="col-3">
                    <div class="form-group">
                        <label for="3">Kelas 3</label>
                        <input type="text" class="form-control" id="3" name="3" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="2">Kelas 2</label>
                        <input type="text" class="form-control" id="2" name="2" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="1">Kelas 1</label>
                        <input type="text" class="form-control" id="1" name="1" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="VIP">VIP</label>
                        <input type="text" class="form-control" id="VIP" name="VIP" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>


            </div><!-- row -->            

            <div class="row">
                
                <div class="col-3">
                    <div class="form-group">
                        <label for="VVIP">VVIP</label>
                        <input type="text" class="form-control" id="VVIP" name="VVIP" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>
                
                <div class="col-3">

                    <div class="form-group">
                        <label for="ICU">ICU</label>
                        <input type="text" class="form-control" id="ICU" name="ICU" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                    
                </div>
                
                <div class="col-3">
                    <div class="form-group">
                        <label for="BPJS">BPJS</label>
                        <input type="text" class="form-control" id="BPJS" name="BPJS" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="form-group">
                        <label for="BPJS_RI">BPJS_RI</label>
                        <input type="text" class="form-control" id="BPJS_RI" name="BPJS_RI" aria-describedby="Satuan" placeholder="Ketik Tarif">
                    </div>
                </div>

            </div><!-- row -->

            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="KATEGORI">KATEGORI</label>
                        <select class="form-control form-control-sm" id="KATEGORI" name="KATEGORI">
                            <option value="">-- Pilih Kategori --</option>
                        </select>
                    </div>
                </div>
                
            </div><!-- row -->

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
    const url = '<?= base_url('master/radiologi/tarifrad'); ?>';
</script>
<script src="<?= base_url('app/master/radiologi/tarif_rad.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>