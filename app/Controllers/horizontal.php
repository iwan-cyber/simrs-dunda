<?php

namespace App\Controllers;

class Horizontal extends BaseController {

	public function index()
	{
		return view('horizontal');
	}

	public function start()
	{
		return view('horizontal-start');
	}

}