<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TeganganAts extends BaseController
{
	public function __construct()
    {
        $this->model = new \App\Models\Sensor();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
	}
	
	public function index()
	{
		return view('tegangan-ats/index');
	}

	public function chart()
    {
        header("content-type: application/json");
        header("HTTP/1.1 200 OK");

		$sensor = $this->model->limit(15)->orderBy('id', 'desc');

		if (!$sensor->first()) {
			die(json_encode([
				'error' => 1,
				'message' => "Data sensor tidak ditemukan!"
			]));
		}

		$sensor = $sensor->get()->getResultObject();

        $labels = [];
        foreach ($sensor as $key => $item) {
            $start = count($sensor) - 15;
            if ($key <= $start) {
                continue;
            }

            $labels[] = $item->created_at;
        }

        $datasetsData = [];
        foreach ($sensor as $key => $item) {
            $start = count($sensor) - 15;
            if ($key <= $start) {
                continue;
            }

            $datasetsData[] = $item->tegangan_ats;
        }

        $datasets = [
            [
                "label" => "Earnings",
                "lineTension" => 0.3,
                "backgroundColor" => "rgba(78, 115, 223, 0.05)",
                "borderColor" => "rgba(78, 115, 223, 1)",
                "pointRadius" => 3,
                "pointBackgroundColor" => "rgba(78, 115, 223, 1)",
                "pointBorderColor" => "rgba(78, 115, 223, 1)",
                "pointHoverRadius" => 3,
                "pointHoverBackgroundColor" => "rgba(78, 115, 223, 1)",
                "pointHoverBorderColor" => "rgba(78, 115, 223, 1)",
                "pointHitRadius" => 10,
                "pointBorderWidth" => 2,
                "data" => ($datasetsData)
            ]
        ];

        $json = [
            "error" => 0,
            "message" => "Data ditemukan.",
            "labels" => $labels,
            "datasets" => $datasets,
            "tegangan_ats" => $sensor[count($sensor) - 1]->tegangan_ats
        ];

        die(json_encode($json));
    }
}
