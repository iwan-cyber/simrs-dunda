<?php

function checkSet($paramCheck, $postdata)
{

	$hasilCheck = true; //hasil check default di set default ke true
	$valueCheck = $valuePost = array();
	
	$arrParamCheck = explode(",", str_replace(' ', '', $paramCheck)); //konversi string $paramcheck menjadi array()

	//konversi $postdata
	foreach($postdata as $name => $val)
	{
		$valuePost[] = $name;
	}

	//check variable
	foreach($arrParamCheck as $check)
	{
		if(!in_array($check, $valuePost))
		{
			$valueCheck[] = $check;
		}
			
	}
	
	if(empty($valueCheck))
	{
		return array("LENGKAP"=>true, "PESAN"=>"data Yang dikirim lengkap");
	}
	else
		$dataArray = implode(", ",$valueCheck);

		//return array("LENGKAP"=>false, "PESAN"=>$dataArray."<br>Data post</br>".implode(" ", $valuePost)."<br>Data post</br>".implode(" ", $valuePost)."<br><br>Data check<br>".implode(" ", $valueCheck)." Tidak ditemukan");

		return array("LENGKAP"=>false, "PESAN"=>$dataArray." Tidak ditemukan");
}

function tgldb($tgl) { return date('Y-m-d', strtotime($tgl)); }

function tgl($tgl) { return date('d-m-Y', strtotime($tgl)); }

function CurFormat($value,$dec=0){
	$res = number_format ($value,$dec,",",".");
	return $res;
}

function checkResultIsFalse($data)
{
	if(empty($data['RESULT']))
		gagal($data['LOG']);
}
	

	function sukses($messages = 'Berhasil', $data = NULL)
	{
		$res = [
			'RESULT'=>TRUE,
			'LOG'=>$messages,
			'DATA'=>$data
		];

		header('Content-type: application/json');
		echo json_encode($res);
		exit;
	}


	function gagal($messages = 'Gagal', $data = NULL)
	{
		$res = [
			'RESULT'=>FALSE,
			'LOG'=>$messages,
			'DATA'=>$data
		];

		header('Content-type: application/json');
		echo json_encode($res);
		exit;
	}

	function done($messages = 'Berhasil', $data = NULL)
	{
		return ['RESULT'=>TRUE, 'LOG'=>$messages, 'DATA'=>$data];
	}

	function fail($messages = 'gagal', $data = NULL)
	{
		return ['RESULT'=>FALSE, 'LOG'=>$messages, 'DATA'=>$data];
	}
	

function checkSetArr($paramCheck, $postdata) {

	$hasilCheck = true; //hasil check default di set default ke true
	$valueCheck = $valuePost = array();

	//konversi $postdata
	foreach($postdata as $name => $val)
	{
		$valuePost[] = $name;
	}

	//check variable
	foreach($paramCheck as $check)
	{
		if(!in_array($check, $valuePost))
		{
			$valueCheck[] = $check;
		}

	}

	if(empty($valueCheck))
	{
		return array("RESULT"=>true, "LOG"=>"data Yang dikirim lengkap");
	}
	else
		$dataArray = implode(", ",$valueCheck);

		return array("RESULT"=>false, "LOG"=>$dataArray." Tidak ditemukan");
}

?>
