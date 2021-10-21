<?= $this->extend('farmasi/template'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Form Penerimaan</h5>
            <div class="card-header-right">
                <div class="row">
                    <div class="col-md-12">
                        
                        <select id="KELOMPOK" name="KELOMPOK" class="ml-2">
                            <option value="0">OBAT</option>
                            <option value="1">BHP</option>
                        </select>

                        <select id="JENIS" name="JENIS" class="ml-2">
                            <option value="0">REGULER</option>
                            <option value="1">E-KATALOG</option>
                        </select>

                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div>
        </div><!-- card-header -->

        <div class="card-block">`

            <div class="row">
                <div class="col-md-12">

                    <?= $this->include('farmasi/penerimaan/form/form-data'); ?>


                </div><!-- col-md-12-->

            </div><!-- row -->

            <div class="row">
                <div class="col-md-12">

                    <table id="rincian" style="font-size: 12px" class="table table-sm small table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>BARANG</th>
            <th style="text-align: center; width: 15%">DITERIMA</th>
            <th style="text-align: right; width: 5%">TOTAL HARGA</th>
            <th style="text-align: center; width: 10%">DISKON</th>
            <th style="text-align: right; width: 10%">PPN</th>
            <th style="text-align: right; width: 10%">SUBTOTAL</th>
        </tr>
    </thead>

    <tbody>
        <?php //load_terima($connect, $notrans); ?>
        <?php //include "form/form-rincian.php"; ?>

    </tbody>
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

<div class="col-sm-12">
    <div class="card">

        <div class="card-block">`

            <div class="row">
                <div class="col-md-12">

                    <?= $this->include('farmasi/penerimaan/form/form-entri'); ?>


                </div><!-- col-md-12-->

            </div><!-- row -->

                        <div class="row">
                <div class="col-12">

      <button type="button" class="btn btn-primary glosy float-right" id="btnsave" onclick="confirmSave()">
        <i class="fas fa-save"></i> Simpan
      </button>

                </div><!-- col-10 -->

            </div><!-- row -->


        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->



<?= $this->include('mega/horizontal/script'); ?>


<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>