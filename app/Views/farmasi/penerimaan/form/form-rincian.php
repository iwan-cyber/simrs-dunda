<?php 


if($POSTING)
	$rincianTerima = new RincianTerima($connect);
else
	$rincianTerima = new RincianTerima_temp($connect);


$rincian = $rincianTerima->get($notrans);


if( ! empty($rincian['DATA']))
{
	foreach($rincian['DATA'] as $key=>$value)
	{

		$TOTAL_TAGIHAN += $value['subtotal'];

		echo '<tr id="tr'.$value['id'].'">
				<td>
					<button class="btn btn-xs" type="button" id="hapus4" onclick="hapus('.$value['id'].')">
		            	<i class="fas fa-times"></i>
		      		</button> '.$value['nama_item'].'<small class="float-right">'.$value['batch'].' / '.$value['tgl_expire'].'</small></td>
		         <td>'.$value['jumlah_unit'].'  '.$value['kemasan'].' @ Rp. '.curFormatDot($value['harga_faktur'], 2).'</td>
		         <td>'.curFormatDot($value['total_harga'], 2).'</td>
		         <td>'.$value['diskon'].'% <span class="rekNilaiDiskon">'.curFormatDot($value['nilai_diskon'], 2).'</span></td>
		         <td class="rekPPN">'.curFormatDot($value['ppn'], 2).'</td>
		         <td class="rekSubtotal">'.curFormatDot($value['subtotal'], 2).'</td>
     		</tr>';
	}
}
else
{
	echo '<tr id="blank">
				<td colspan="10" style="text-align: center; background-color: red; color: white">Belum Ada Tagihan</td></tr>';
}


