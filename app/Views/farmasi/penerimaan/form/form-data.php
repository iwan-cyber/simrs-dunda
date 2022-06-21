
<div class="row">

    <div class="form-group col-3">
        <label>Tgl & Nomor Faktur</label>
        <div class="input-group">

        <input type="text" class="form-control form-control-sm tanggal entri-data" id="TGL_FAKTUR" name="TGL_FAKTUR" data-toggle="tooltips" data-placement="bottom" title="Ketik Tanggal Faktur, ex: 10-10-2021" placeholder="Ketik Tgl Faktur" autocomplete="off" value="<?php //echo $TGL_FAKTUR; ?>">
        <input type="text" class="form-control form-control-sm entri-data" id="FAKTUR" name="FAKTUR" placeholder="Ketik No. Faktur" data-toggle="tooltips" data-placement="bottom" title="Ketik Nomor Faktur" autocomplete="off" value="<?php //echo $FAKTUR; ?>">
    </div>
    </div>

    <div class="col-5">
    <div class="form-group">
        <label for="REKANAN">Rekanan</label>
        <select class="form-control form-control-sm select2 entri-data" id="REKANAN" name="REKANAN">
            <?php //echo getRekanan($connect, $REKANAN); ?>
        </select>
    </div>
    </div>

    <div class="form-group col-2">
        <label for="JATUH_TEMPO">Jatuh Tempo</label>
        <input type="text" class="form-control form-control-sm tanggal entri-data" id="JATUH_TEMPO" name="JATUH_TEMPO" placeholder="jatuh tempo" data-toggle="tooltips" data-placement="bottom" title="Ketik Tanggal Jatuh Tempo, ex: 10-10-2021" autocomplete="off" value="<?php //echo $JATUH_TEMPO; ?>">
    </div>

    <div class="form-group col-2">
        <label for="TGL_TERIMA">Tgl Terima</label>
        <input type="text" class="form-control form-control-sm tanggal entri-data" id="TGL_TERIMA" name="TGL_TERIMA" placeholder="Tgl Terima"
        data-toggle="tooltips" data-placement="bottom" title="Ketik tanggal terimanya di barang ex: 10-10-2021" autocomplete="off" value="<?php //echo $TGL_TERIMA; ?>">
    </div>





</div><!-- row -->


