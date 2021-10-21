<html>
	<head>
		<meta charset="UTF-8">
		<title>Data Barang Masuk</title>
		<link rel="stylesheet" href="<?php echo base_url('public/report_detail.css'); ?>">
	</head>
	<body>

		<center>
			<h2 class="header">Laporan Barang Masuk</h2>
			<h4 class="header">Tanggal : <?= $DARI; ?> s/d <?= $SAMPAI; ?></h4>
		</center>

		<table class="tabel" width="100%">
			<thead>
				<tr align="center">
					<th width="5%" rowspan="2">NO.</th>
					<th width="20%" rowspan="2">NOMOR</th>
					<th width="10%" rowspan="2">TANGGAL</th>
					<th width="10%" rowspan="2">KODE ITEM</th>							
					<th rowspan="2">NAMA ITEM</th>							
					<th width="10%" rowspan="2">JUMLAH</th>							
				</tr>
			</thead>

			<tbody>

			<?php
				$no = 0;
				$trans = ''; //kunci utama untuk mengecek data row yang duplicat
				foreach ($DATA as $key => $val) {

					if($val->trans === $trans) {
						$nomor = $tanggal = '';
						$nourut = '';
						$borderTop = '';
					} else {
						$borderTop = ' class="border" ';
						$nomor = $val->nomor;
						$tanggal = tgl($val->tanggal);
						$nourut = ++$no.'. ';
					}

					echo '<tr>
							<td style="text-align: center" '.$borderTop.'>'.$nourut.'</td>
							<td style="text-align: center" '.$borderTop.'>'.$nomor.'</td>
							<td style="text-align: center" '.$borderTop.'>'.$tanggal.'</td>
							<td style="text-align: center" class="border">'.$val->kode_item.'</td>
							<td class="border">'.$val->nama_item.'</td>
							<td style="text-align: center" class="border">'.$val->jumlah.' '.$val->sat_kecil.'</td>
						</tr>';

					$trans = $val->trans;
				}
			
			?>

			</tbody>
		</table>
	</body>
</html>
