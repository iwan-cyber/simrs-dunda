<div class="card card-outline card-primary">
	<div class="card-header">
			<h3 class="card-title">Kalibrasi</h3>
	</div>
	<div class="card-body">


<div class="row">
	
		<div class="form-group col-3">
			<label for="BULAN">Dari Tanggal</label>
			<input type="date" id="DARI" name="DARI" class="form-control form-control-sm" value="<?php echo date("Y-m-01"); ?>">
		</div>

		<div class="form-group col-3">
			<label for="BULAN">Sampai Dengan</label>
			<input type="date" id="SAMPAI" name="SAMPAI" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
		</div>

		<div class="form-group col-2">
			<label for="BULAN" style="color: white">pilih bulan</label>
			<button type="button" onclick="Laporan.print('kalibrasi')" class="btn btn-primary btn-flat btn-sm">Ambil Data</button>
		</div>

</div><!-- row -->
</div><!--card-body-->
</div><!-- card -->