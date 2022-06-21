<?php

if(isset($_REQUEST['tipe']))
{

    $permintaan = new Permintaan($connect);

    $dataPermintaan = $permintaan->get($notrans);

    $unit = $dataPermintaan['DATA']['kode_unit'];
    $tglOrder = $dataPermintaan['DATA']['tanggal'];


}


?>
<div class="row">

	<div class="form-group col-2">
      <label for="TANGGAL">Tgl Keluar</label>
      <input type="text" class="form-control form-control-sm tanggal entri-data" id="TANGGAL" name="TANGGAL" placeholder="Tanggal"
        data-toggle="tooltips" data-placement="bottom" title="Ketik tanggal Keluarnya di barang ex: 10-10-2021" autocomplete="off" value="<?php echo date("d-m-Y"); ?>">
   </div>


   <div class="col-10">
	    <div class="form-group">
	        <label for="UNIT">Unit</label>
	        <select class="form-control form-control-sm select2 entri-data" id="UNIT" name="UNIT">
	            <?php echo unitFarmasi($connect, $unit); ?>
	        </select>
	    </div>
    </div>

</div><!-- row -->

