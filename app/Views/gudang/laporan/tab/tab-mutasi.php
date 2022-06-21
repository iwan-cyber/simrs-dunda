<form method="GET" id="form_mutasi" target="_blank">
	<div class="card card-primary card-outline">

		<div class="card-header with-border">
			<h5 class="card-title m-0">D. Mutasi</h5>
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
						<button type="button" onclick="Laporan.print('mutasi')" class="btn btn-primary btn-flat btn-sm">Ambil Data</button>
					</div>

			</div><!-- row -->
		</div><!-- card-body -->
	</div>
</form>