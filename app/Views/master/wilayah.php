<?= $this->extend('mega/horizontal/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('mega/horizontal/css-dt'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Wilayah</h5>
            <div class="card-header-right">
                <div class="row">
                    <div class="col-md-12">
                        <!--button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Tambah Data</button-->
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="alert alert-primary background-primary">
                <strong>Klik Kiri 2x di pilihan wilayah untuk melihat data sub wilayah</strong>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="PROVINSI">Provinsi</label>
                        <select class="form-control form-control-sm" id="PROVINSI" name="PROVINSI" multiple="" size="20" ondblclick="getKabupaten()">
                            <?php

                                foreach ($PROVINSI as $key => $value) {
                                    echo '<option value="'.$value['ID'].'">'.$value['DESKRIPSI'].'</option>';    
                                }

                            ?>
                        </select>
                    </div><!-- form-group -->
                </div><!-- col-md-12-->                

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="KABUPATEN">Kota/Kabupaten</label>
                        <select class="form-control form-control-sm" id="KABUPATEN" name="KABUPATEN" multiple="" size="20" ondblclick="getKecamatan()"></select>
                    </div><!-- form-group -->
                </div><!-- col-md-12-->                

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="KECAMATAN">KECAMATAN</label>
                        <select class="form-control form-control-sm" id="KECAMATAN" name="KECAMATAN" multiple="" size="20" ondblclick="getKelurahan()"></select>
                    </div><!-- form-group -->
                </div><!-- col-md-12-->                

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="KEL">KEL/DESA</label>
                        <select class="form-control form-control-sm" id="KELURAHAN" name="KELURAHAN" multiple="" size="20"></select>
                    </div><!-- form-group -->
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
                <input type="text" class="form-control" id="ID_UJI" name="" aria-describedby="id uji" placeholder="Otomatis" readonly="">
            </div>
            
            <div class="form-group">
                <label for="PROVINSI">PROVINSI</label>
                <select class="form-control form-control-sm" id="PROVINSI" name="PROVINSI" multiple="">
                    <option value="">-- Pilih Provinsi --</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="KAB">KAB/KOTA</label>
                <select class="form-control form-control-sm" id="KAB" name="KAB">
                    <option value="">-- Pilih Kab/Kota --</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="KEC">KECAMATAN</label>
                <select class="form-control form-control-sm" id="KEC" name="KEC">
                    <option value="">-- Pilih kecamatan --</option>
                </select>
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

                        // foreach ($KELOMPOK_UJI as $key => $value) {

                        //     echo '<option value="'.$value['id_kelompok'].'">'.$value['nama_kelompok'].'</option>';
                        // }
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
    const url = '<?= base_url('master/wilayah'); ?>';
</script>
<script src="<?= base_url('app/master/wilayah.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>