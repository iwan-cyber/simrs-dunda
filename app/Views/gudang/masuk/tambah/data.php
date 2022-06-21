<?php //var_dump($REKANAN); 

// $opt_rekanan = '';

// foreach ($REKANAN as $value) {

// 	$opt_rekanan .= '<option value="'.$value->id_rekanan.'">'.$value->nama_rekanan.'</option>';
	
// }
?>

<style>

	.th-id { width: 10%; }

	.th-action { width: 5%; }

	.th-jumlah { width: 10%; }

</style>


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Data Faktur Terima</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		
			<div class="row">

				<div class="col-2">
					<!-- text input -->
					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" class="form-control form-control-sm date" 
							id="TANGGAL" name="TANGGAL" value="<?php echo date("Y-m-d"); ?>"
							placeholder="Tanggal Terima" title="Pilih Tanggal terima">
					</div>
				</div>

				<div class="col-10">
					<!-- text input -->
					<div class="form-group">
						<label>Terima Dari</label>
						<select  class="form-control form-control-sm select2" id="REKANAN" name="REKANAN" >
							<?php //echo $opt_rekanan; ?>
						</select>
					</div>
				</div>
				

				
			</div><!-- row -->

			<div class="row">
				
				<table  id="rincian" class="table table-hover text-nowrap table-sm table-bordered">

					<thead>
						<tr>
							<th class="th-id">ID</th>
							<th class="th-item">ITEM</th>
							<th class="th-jumlah">JUMLAH</th>
							<th class="th-action">#</th>
						</tr>
					</thead>

					<tbody id="rincian-item">
						
						<?php

							// foreach($RINCIAN as $key => $value) {
							// 	$tombol = '<button class="btn btn-xs btn-danger" type="button" id="hapus'.$value->id.'" onclick="checkDelete('.$value->id.')">
							// 				<i class="fas fa-times"></i>
							// 			</button>';

							// 	echo '<tr id="tr'.$value->id.'">
							// 			<td>'.$value->kode_item.'</td>
							// 			<td>'.$value->nama_item.'</td>
							// 			<td>'.$value->jumlah.' '.$value->sat_kecil.'</td>
							// 			<td>'.$tombol.'</td>
							// 		</tr>';
							// }

						?>

					</tbody>

				</table>

			</div><!-- row -->

	</div><!-- /.card-body -->

	<div class="card-footer">
	   <div class="row">
	     
        <button type="button" class="btn btn-primary" id="btnSave" onClick="checkSave()">
             <i class="fas fa-save"> </i> SIMPAN & POSTING
         </button>

	   </div><!-- row -->
	</div><!-- card-footer -->


</div><!-- card -->
