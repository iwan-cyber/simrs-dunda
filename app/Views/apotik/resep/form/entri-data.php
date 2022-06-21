<div class="row">
    <div class="col-md-12">
        <div class="row">
            
            <div class="col-md-3">
                <label class="control-label" for="TANGGAL">Tanggal Resep</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control form-control-sm check tanggal" id="TANGGAL" name="TANGGAL" value="<?php echo $tanggal; ?>" placeholder="tgl/bln/thn">
                </div>
            </div><!-- col-md-3 -->
            
            <div class="col-md-3">
                    <label class="control-label" for="NORM">No.RM</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="NORM" name="NORM"
                        placeholder="Ketik No.MR" title="Ketikkan No.MR tanpa tanda (-) dan lalu tekan tombol ENTER, untuk mengambil data pasien" value="<?php echo $norm; ?>">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" onclick="Pasien.get()" id="btnpasien" title="Klik di sini untuk mengambil nomr">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </span>
                    </div><!--input group -->
            </div>

            <div class="col-md-6">
                    <label class="control-label" for="NAMA_PASIEN">Nama Pasien</label>
                    <input type="text" id="NAMA_PASIEN" name="NAMA_PASIEN" placeholder="Ketik Nama Pasien"
                    class="form-control form-control-sm check" value="<?php echo $nama_pasien; ?>">
            </div>

        </div><!-- row -->
    </div><!-- col-md-12 -->

</div><!-- row -->

<div class="row">

    <div class="col-md-12">

        <div class="row">
            
            <div class="col-md-3">
                <label class="control-label" for="CARABAYAR">Cara Bayar</label>
                <select id="CARABAYAR" name="CARABAYAR" class="form-control form-control-sm select" required>
                    <option value="">-- Pilih Carabayar --</option>
                    <?php getCarabayar2($connect, $carabayar); ?>
                </select>
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <label class="control-label" for="RUANGAN">Ruangan/Poli</label>
                <select id="RUANGAN" name="RUANGAN" class="form-control form-control-sm select" required>
                    <option value="">-- Pilih Poli/Ruangan --</option>
                    <?php getRuangan($connect, $jenis, $ruangan); ?>
                </select>
            </div><!-- col-md-3 -->

            <div class="col-md-6">
                <label class="control-label" for="KDDOKTER">Dokter</label>
                <select id="KDDOKTER" name="KDDOKTER" class="form-control form-control-sm select" required>
                    <option value="">-- Pilih Dokter --</option>
                    <?php getDokter($connect, $kddokter); ?>
                </select>
            </div><!-- col-md-3 -->

        </div><!-- row -->

    </div><!-- col-md-12 -->

</div><!-- row -->