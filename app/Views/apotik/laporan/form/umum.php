              <form method="GET" id="form_umum" target="_blank">

              <div class="card card-primary card-outline">
              
                <div class="card-header with-border">
                  <h5 class="card-title m-0">H. Pembayaran Umum</h5>
                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-12">
                      <label class="control-label" for="UNIT"> PILIH UNIT APOTIK</label>
                      <select id="UNIT" name="UNIT" class="form-control form-control-sm select2" required>
                        <option value="">Semua</option>
                        <?php //getUnitFarmasiStock($connect, null); ?>
                      </select>
                    </div>   

                  </div><!-- row -->


                  <div class="row">

                    <div class="col-6">
                      <label class="control-label" for="TGL_AWAL">Dari Tanggal</label>
                      <input class="form-control form-control-sm tanggal" id="TGL_AWAL4"  name="TGL_AWAL" type="text" value="<?php echo date("01-m-Y"); ?>">
                    </div>

                    <div class="col-6">
                      <label class="control-label" for="TGL_AKHIR">Sampai Dengan</label>
                      <input class="form-control form-control-sm tanggal" id="TGL_AKHIR4"  name="TGL_AKHIR" type="text" value="<?php echo date("d-m-Y"); ?>">
                    </div>

                  </div><!-- row -->
                
                </div><!-- card-body -->

                <div class="card-footer">

                  <button  type="button"  id="btn_resep_pasien"  class="btn btn-primary"  onClick="report('#form_umum', 'umum')">
                    <i class="fas fa-download"></i> LOAD
                  </button>

                  <button  type="button"  id="btn_resep_pasien_ex" class="btn btn-success float-right"  onClick="report('#form_umum', 'umum', 'true')">
                    <i class="fas fa-file"></i> Export Ke Excel
                  </button>

                </div><!-- card-footer -->

              </div><!-- card resep pasien -->
            </form>