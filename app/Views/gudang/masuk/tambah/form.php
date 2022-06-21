<?php //var_dump($REKANAN); 

// $opt_item = '';

// foreach ($ITEM as $value) {

// 	$opt_item .= '<option value="'.$value->kode_item.'" data-satuan="'.$value->SATUAN.'">'.$value->nama_item.'</option>';
	
// }

?>


<div class="card card-primary card-outline">

	<div class="card-header">
		<h5 class="card-title">Form Entrian</h5>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" id="btnItemRefresh" onclick="itemRefresh()">
				<i class="fas fa-sync"></i> Item Refresh
			</button>
		</div><!-- card-tools -->
	</div><!-- /.card-header -->

	<div class="card-body">

		<form id="form-entri">
			
			<div class="row">

				<div class="col-6">
					<div class="form-group">
						<label>Pilih Item</label>
						<select  class="form-control form-control-sm select2" id="CARI" name="CARI">
							<option value="">-- pilih item --</option>
							<?php //echo $opt_item; ?>
						</select>
					</div>
				</div>

				<div class="col-2">
					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" class="form-control form-control-sm angka" 
							id="JUMLAH" name="JUMLAH" placeholder="Jumlah" value="0" title="Masukkan Jumlah">
					</div>
				</div>

				<div class="col-2">
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control form-control-sm" 
							id="SAT_KECIL" name="SAT_KECIL" placeholder="satuan" title="Satuan terkecil">
					</div>
				</div>
								
				<div class="col">
					<div class="form-group">
						<label style="color: #fff"></cite>">#</label>
						<button type="button" id="btnAdd" class="btn-block btn btn-primary btn-sm" onclick="check()">
							<i class="fas fa-plus"></i>Tambah
						</button>
					</div>
				</div>

				
			</div><!-- form-entri -->
			
		</form>

	</div><!-- /.card-body -->

</div><!-- card -->
