<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function __construct()
    {
        $this->model = new \App\Models\Sensor();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
	}

	public function index()
	{
		$data['sensor'] = $this->model->limit(1)->orderBy('id', 'desc')->get()->getResultObject()[0];

		return view('dashboard/index', $data);
	}
}
