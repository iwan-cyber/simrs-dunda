            <form method="GET" id="form_daftar_resep" target="_blank">
            
              <div class="card card-primary card-outline">
              
                <div class="card-header with-border">
                  <h5 class="card-title m-0">A. Rekap Daftar Resep</h5>
                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-6">
                      <label class="control-label" for="UNIT"> UNIT APOTIK</label>
                      <select id="UNIT" name="UNIT" class="form-control form-control-sm select2" required>
                        <option value="">Semua</option>
                        <?php //getUnitFarmasiStock($connect, null); ?>
                      </select>
                    </div>   

                    <div class="col-6">
                      <label class="control-label" for="RUANGAN"> RUANGAN</label>
                      <select id="RUANGAN" name="RUANGAN" class="form-control form-control-sm select2" required>
                        <option value="">Semua</option>
                        <?php //getRuanganAll($connect); ?>
                      </select>
                    </div>     
                  </div><!-- row -->

                  <div class="row">
                    <div class="col-6">
                      <label class="control-label" for="CARABAYAR"> Carabayar</label>
                      <select id="CARABAYAR" name="CARABAYAR" class="form-control form-control-sm" required>
                        <option value="">Semua</option>
                        <?php //getCarabayar2($connect, $CARABAYAR); ?>
                      </select>
                    </div>

                    <div class="col-6">
                      <label class="control-label" for="JENIS_RESEP"> Jenis Resep</label>
                      <select id="JENIS_RESEP" name="JENIS_RESEP" class="form-control form-control-sm" required>
                        <option value="">Semua</option>
                        <option value="rj">RAWAT JALAN</option>
                        <option value="ri">RAWAT INAP</option>
                        
                      </select>
                    </div>   

                  </div><!-- row -->


                  <div class="row">

                    <div class="col-6">
                      <label class="control-label" for="TGL_AWAL">Dari Tanggal</label>
                      <input class="form-control form-control-sm tanggal" id="TGL_AWAL1"  name="TGL_AWAL" type="text" value="<?php echo date("d-m-Y"); ?>">
                    </div>

                    <div class="col-6">
                      <label class="control-label" for="TGL_AKHIR">Sampai Dengan</label>
                      <input class="form-control form-control-sm tanggal" id="TGL_AKHIR1"  name="TGL_AKHIR" type="text" value="<?php echo date("d-m-Y"); ?>">
                    </div>

                  </div><!-- row -->
                
                </div><!-- card-body -->

                <div class="card-footer">

                  <button 
                    type="button"
                    id="btn_resep_pasien"
                    class="btn btn-primary"
                    onClick="report('#form_daftar_resep', 'daftar_resep')">
                    <i class="fas fa-download"></i> LOAD
                  </button>

                  <button 
                    type="button"
                    id="btn_resep_pasien_ex"
                    class="btn btn-success float-right"
                    onClick="reportExcel('#form_daftar_resep', 'daftar_resep', 'true' )">
                    <i class="fas fa-file"></i> Export Ke Excel
                  </button>

                </div><!-- card-footer -->

              </div><!-- card resep pasien -->
            </form>