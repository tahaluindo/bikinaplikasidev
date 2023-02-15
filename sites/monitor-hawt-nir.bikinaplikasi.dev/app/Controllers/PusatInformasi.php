<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PusatInformasi extends BaseController
{
	public function index()
	{
		return view('pusat-informasi/index');
	}
}
