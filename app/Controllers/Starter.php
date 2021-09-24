<?php

namespace App\Controllers;


/** template controller untuk starter */


class Starter extends BaseController
{

	public function index()
	{

		$data = [];

		$data['content'] = [
			'TITLE' => 'ini judul',
			'DESC' => 'ini deskripsi',
		];

		$data['content']['ITEM'] = [
			['LINK' => '#', 'DESC' => 'ini deskripsi'],
			['LINK' => '#', 'DESC' => 'ini deskripsi']
		];

		$this->startTema();
		echo view('mega/box/content-header', $data);
		echo view('mega/box/content');
		echo view('mega/box/content-footer');
		$this->endTema();
	}

	public function startTema()
	{
		echo view('mega/box/header');
		echo view('mega/box/navbar');
		echo view('mega/box/sidebar-menu');
	}

	public function endTema()
	{
		echo view('mega/box/footer');
	}
}
