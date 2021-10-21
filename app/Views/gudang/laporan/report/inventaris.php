<html>
	<head>
		<meta charset="UTF-8">
		<title>Data Inventaris</title>
		<link rel="stylesheet" href="<?php echo base_url('public/report.css'); ?>">
	</head>
	<body>

		<center>
			<h2 class="header">DATA Inventaris</h2>
			<h4 class="header">Tanggal : <?= $DARI; ?> s/d <?= $SAMPAI; ?></h4>
		</center>

		<table class="tabel" width="100%">
			<thead>
				<tr align="center">
					<th width="5%" rowspan="2">NO.</th>
					<th width="5%" rowspan="2">ID</th>
					<th width="5%" rowspan="2">KODE ALAT</th>
					<th width="20%" rowspan="2">NAMA ALAT</th>							
					<th width="10%" rowspan="2">UNIT</th>
					<th width="10%" rowspan="2">TANGGAL</th>							
				</tr>
			</thead>

			<tbody>

			<?php

				$no = 0;
				foreach ($INVENTARIS as $key => $val) {
					echo '<tr>
						<td style="text-align: center">'.++$no.'.</td>
						<td style="text-align: center">'.$val->id.'</td>
						<td style="text-align: center">'.$val->kode_item.'</td>
						<td>'.$val->nama_item.'</td>
						<td style="text-align: center">'.$val->nama_unit.'</td>
						<td style="text-align: center">'.$val->tanggal.'</td>
					</tr>';
				}
			
			?>

			</tbody>
		</table>
	</body>
</html>
