<?php 


if($POSTING)
	$rincianKeluar = new RincianKeluar($connect);
else
	$rincianKeluar = new RincianKeluar_temp($connect);


$rincian = $rincianKeluar->get($notrans);


if( ! empty($rincian['DATA']))
{
	foreach($rincian['DATA'] as $key=>$value)
	{

     	$btnHapus = `<button type="button" class="btn btn-xs btn-danger btn-block" id="hapus${id}" onclick="hapus(${id})">hapus</button>`;

     	 echo '<tr id="tr'.$value['id_stock'].'">
            <td>'.$value['nama_item'].' <div class="float-right"></div></td>
            <td>'.$value['stock'].'</td>
            <td>'.$value['jumlah_besar'].' '.$value['sat_besar'].'</td>
            <td>'.$value['isi'].'</td>
            <td>'.$value['jumlah'].' '.$value['sat_kecil'].'</td>
            <td>'.$btnHapus.'</td></tr>';
	}
}
else
{
	echo '<tr id="blank">
				<td colspan="10" style="text-align: center; background-color: red; color: white">Belum Ada Tagihan</td></tr>';
}


