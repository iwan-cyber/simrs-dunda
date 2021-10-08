<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Uji Test</h5>
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
                                    <th>ID UJI</th>
                                    <th>UJI TES</th>
                                    <th>SATUAN</th>
                                    <th>NILAI NORMAL</th>
                                    <th>URUTAN</th>
                                    <th>KELOMPOK</th>
                                    <th>SUB KELOMPOK</th>
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
                <label for="ID_UJI">ID UJI</label>
                <input type="text" class="form-control" id="ID_UJI" name="" aria-describedby="id uji" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="UJI_TES">UJI TES</label>
                <input type="text" class="form-control" id="UJI_TES" name="UJI_TES" aria-describedby="Uji Tes" placeholder="Ketik Nama Kelompok">
            </div>
            <div class="form-group">
                <label for="SATUAN">SATUAN</label>
                <input type="text" class="form-control" id="SATUAN" name="SATUAN" aria-describedby="Uji Tes" placeholder="Ketik Nama Kelompok">
            </div>
            <div class="form-group">
                <label for="NILAI NORMAL">NILAI_NORMAL</label>
                <input type="text" class="form-control" id="NILAI_NORMAL" name="NILAI_NORMAL" aria-describedby="Nilai Normal" placeholder="Ketik Nama Kelompok">
            </div>
            <div class="form-group">
                <label for="KELOMPOK_URUT">URUTAN</label>
                <input type="text" class="form-control" id="KELOMPOK_URUT" name="KELOMPOK_URUT" placeholder="Ketik PPK">
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
            <div class="form-group">
                <label for="ID_SUB">SUB KELOMPOK</label>
                <select class="form-control form-control-sm" id="ID_SUB" name="ID_SUB">
                    <option value="">-- Pilih Kelompok --</option>
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
    const url = '<?= base_url('master/lab/ujites'); ?>';
</script>
<script src="<?= base_url('app/master/lab/uji_tes.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>