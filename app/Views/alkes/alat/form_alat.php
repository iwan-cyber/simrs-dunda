<?= $this->extend('alkes/template'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Form Tambah Alat</h5>
        </div><!-- card-header -->

        <div class="card-block">`

            <div class="row">

                            <form id="form-alat">

                <div class="row">

                    <div class="form-group col-4">
                        <label for="KODE_ITEM">Kode Item</label>
                        <input type="text" id="KODE_ITEM" name="KODE_ITEM" placeholder="Otomatis" class="form-control form-control-sm" value="" readonly>
                    </div>

                    <div class="form-group col-4">
                        <label for="NAMA_ITEM">Nama Alat</label>
                        <input type="text" id="NAMA_ITEM" name="NAMA_ITEM" placeholder="Ketik Nama Alat" class="form-control form-control-sm isian" value="" required>
                    </div>

                    <div class="form-group col-4">
                        <label for="BARCODE">Barcode</label>
                        <input type="text" id="BARCODE" name="BARCODE" placeholder="Ketik Barcode" class="form-control form-control-sm isian" value="" required>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <div class="form-group col-4">
                        <label for="REKANAN">Rekanan</label>
                        <input type="text" id="REKANAN" name="REKANAN" placeholder="Ketik Rekanan" class="form-control form-control-sm isian" value="" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="MEREK">Merek</label>
                        <input type="text" id="MEREK" name="MEREK" placeholder="Ketik Merek" class="form-control form-control-sm isian" value="" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="TAHUN">Tahun</label>
                        <input type="number" id="TAHUN" name="TAHUN" placeholder="Tahun Pembelian" class="form-control form-control-sm isian"  value="" required>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ID_JENIS">Jenis</label>
                        <select id="ID_JENIS" name="ID_JENIS" class="form-control form-control-sm select" required>
                            <option value="">-- Pilih Jenis--</option>
                            <?php

                                // foreach($JENIS as $value)
                                // {
                                //     $selected = ($value->ID_REF === $id_jenis) ? 'selected':'';

                                //     echo '<option value="'.$value->ID_REF.'" id="opt'.$value->ID_REF.'" '.$selected.'>'.$value->DESKRIPSI.'</option>';
                                    
                                // }

                            ?>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="KONDISI">Kondisi Alat</label>
                        <select id="KONDISI" name="KONDISI" class="form-control form-control-sm select" required>
                            <option value="">-- Pilih Kondisi--</option>
                            <?php

                                // foreach($KONDISI as $value)
                                // {
                                //     $selected = ($value->ID_REF === $kondisi) ? 'selected':'';

                                //     echo '<option value="'.$value->ID_REF.'" id="opt'.$value->ID_REF.'" '.$selected.'>'.$value->DESKRIPSI.'</option>';
                                    
                                // }

                            ?>
                        </select>
                    </div>
                </div><!-- row -->

            </form>
                

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

<?= $this->include('alkes/script'); ?>


<script>
    const url = '<?= base_url('farmasi/penerimaan'); ?>';
</script>
<script src="<?= base_url('farmasi/penerimaan.js?'.rand()); ?>"></script>

<?= $this->endSection(); ?>