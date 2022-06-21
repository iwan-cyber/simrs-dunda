<?= $this->extend('apotik/template'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Form Opname</h5>
        </div><!-- card-header -->

        <div class="card-block">`

            <div class="row">
            <div class="form-group col-2">
                <label for="TANGGAL">Tanggal Opname</label>
                <input type="text" class="form-control form-control-sm tanggal" id="TANGGAL" name="TANGGAL" value="<?php echo date("d-m-Y"); ?>">
            </div>

            <div class="form-group col-10">
                <label for="NAMA_UNIT">Unit Opname</label>
                <input type="text" class="form-control form-control-sm entrian isian" id="NAMA_UNIT" name="NAMA_UNIT" placeholder="GUDANG" value="GUDANG">
                <input type="hidden" id="UNIT" value="GDU">
            </div>

            </div><!-- row -->

            <div class="row">
                <div class="col-md-12">

      <table id="rincian" class="table table-sm small table-bordered table-hover table-striped">
         <thead>
             <tr>
                            <th style="width: 35%">Nama</th>
                            <th style="width: 10%">Jumlah</th>
                            <th style="width: 5%">x</th>
             </tr>
         </thead>
         <tbody>
             <?php //loadPengeluaran($connect, $notrans); ?>
         </tbody>
           <?= $this->include('apotik/opname/form/form-entri'); ?>

      </table>
                    
                </div><!-- col-12 -->
            </div><!-- row -->

            <div class="row">
                <div class="col-10">
                            <button type="button" class="btn btn-warning" id="btndraft" onclick="confirmSave('draft')">
            <i class="fas fa-save"></i> Draft
        </button>

      <button type="button" class="btn btn-success glosy" id="btnsave" onclick="confirmSave()">
        <i class="fas fa-save"></i> Simpan
      </button>

                </div><!-- col-10 -->

                <div class="col-2">

                          <input type="text" class="form-control form-control-sm text-right" id="TOTAL_TAGIHAN" name="TOTAL_TAGIHAN" placeholder="Total" value="<?php //echo curFormat($TOTAL_TAGIHAN,2); ?>">
                    
                </div><!-- col-12 -->
            </div><!-- row -->

        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->

<?= $this->include('apotik/script'); ?>


<script>
    const url = '<?= base_url('farmasi/pengeluaran'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>