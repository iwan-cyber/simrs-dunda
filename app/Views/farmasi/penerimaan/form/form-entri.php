<div class="row">
	<div class="form-group col-7">

		<label for="NAMA">Nama Item</label>
		<input type="text" id="NAMA" name="NAMA" class="form-control form-control-sm entrian isian" placeholder="Ketik Nama Item untuk mencari" data-toogle="tooltips" data-placement="bottom" title="Ketik nama item minimal 3 huruf depan">
		<input type="hidden" id="ID_STOCK" name="ID_STOCK">
		<input type="hidden" id="KODE_ITEM" name="KODE_ITEM">

	</div>
	<div class="form-group col-3">
		<label for="BATCH">Batch/Expire</label>
		<div class="input-group">

			<input type="text" class="form-control form-control-sm entrian isian" id="BATCH" name="BATCH"
				placeholder="Kode Batch" data-toogle="tooltips" data-placement="bottom" title="Ketik Kode Batch" value="BATCH">

			<input type="text" class="form-control form-control-sm tanggal entrian isian" id="TGL_EXPIRE" name="TGL_EXPIRE"
				placeholder="Tgl Expire" data-toggle="tooltips" data-placement="bottom" title="Ketik Tanggal Kadaluarsa contoh: 10-10-2021" value="01-01-2021">

		</div>
	</div>
	<div class="form-group col-2">
		<label for="KEMASAN">Kemasan/Isi</label>
		<div class="input-group">

			<input type="text" id="KEMASAN" name="KEMASAN" class="form-control form-control-sm entrian isian"
				placeholder="Kemasan" data-toggle="tooltips" data-placement="bottom" title="Ketik Kemasan contoh: box/10" autofocus="off" value="BOX/10">

			<input type="number" id="ISI" name="ISI" onchange="Hitung.stock()" class="form-control form-control-sm entrian text-right angka"
				placeholder="Isi" data-toggle="tooltips" data-placement="bottom" title="Ketik isi/frac dari kemasan per unit" autocomplete="off">

		</div>
	</div>
	</div><!-- row -->
	<div class="row">
		<div class="form-group col-1">

			<label for="JUMLAH_UNIT">Jml Unit</label>

			<input type="number" id="JUMLAH_UNIT" name="JUMLAH_UNIT" onchange="Hitung.stock()" class="form-control form-control-sm entrian isian"
				placeholder="Isi Jml" data-toggle="tooltips" data-placement="bottom" title="isikan jumlah unit yang diterima" autocomplete="off">

		</div>
		<div class="form-group col-2 ml-n2">
			<label for="HARGA_FAKTUR">Harga Faktur</label>

			<input type="text" id="HARGA_FAKTUR" name="HARGA_FAKTUR" onblur="Hitung.totalHarga()" class="form-control form-control-sm entrian uang isian"
				placeholder="Harga Faktur" data-toggle="tooltips" data-placement="bottom" title="Ketik harga yang di faktur" autocomplete="off">

		</div>
		<div class="form-group col-2 ml-n2">
			<label for="TOTAL_HARGA">Total Harga</label>
			<input type="text" id="TOTAL_HARGA" name="TOTAL_HARGA" class="form-control form-control-sm text-right uang angka"
			 placeholder="Total harga" data-toggle="tooltips" data-placement="bottom" title="Total Harga akan terhitung otomatis, bisa di ketik manual" autocomplete="off">
		</div>
		<div class="form-group col">
			<label for="DISKON">Diskon (%)</label>
			<div class="input-group">

				<input type="text" id="DISKON" name="DISKON" class="form-control form-control-sm text-center angka" onchange="Hitung.diskon()"
				 placeholder="%" data-toggle="tooltips" data-placement="bottom" title="Ketik jumlah diskon %, jika 20% cukup ketik 20 lalu ENTER untuk menghitung jumlah nilai diskon" autocomplete="off">

				<input type="text" class="form-control form-control-sm text-right uang angka"
				id="NILAI_DISKON" name="NILAI_DISKON" placeholder="Nilai " data-toggle="tooltips" data-placement="bottom" title="Nilai diskon akan terisi otomatis, di hitung dari jumlah diskon %" autocomplete="off">

			</div>
		</div>
		<div class="form-group col">
			<label for="PPN">ppn %</label>
			<input type="text" class="form-control form-control-sm text-right uang angka" onfocus="Hitung.ppn()"
			id="PPN" name="PPN" placeholder="PPN 10%" data-toggle="tooltips" data-placement="bottom" title="Nilai PPN terhitung otomatis jika di klik, bisa juga di isi manual" autocomplete="off">
		</div>
		<div class="form-group col">
			<label for="SUBTOTAL">Subtotal</label>
			<input type="text" class="form-control form-control-sm text-right uang angka"
			id="SUBTOTAL" name="SUBTOTAL" placeholder="Nilai Subtotal" data-toggle="tooltips" data-placement="bottom" title="Subtotal akan terisi otomatis, bisa di ketik manual" autocomplete="off">
		</div>
		<input type="hidden" id="MASUK_STOCK" name="MASUK_STOCK" value="0">
		</div><!-- row -->
