<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sensor extends BaseController
{
	public function __construct()
    {
        $this->model = new \App\Models\Sensor();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
    }
    
    // download data sensor
    public function download()
    {
        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();

        // todo: mengambil isi header dari tabel
        $userTable = ['kecepatan_angin', 'tegangan_wind_turbine', 'tegangan_ats', 'arus_wind_turbine', 'arus_ats', 'tanggal_dan_waktu'];

        // todo: mengisi data header ke baris excel
        $column = "A";
        foreach ($userTable as $header => $userHeader):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . 1, $userHeader);
        endforeach;

        // todo: untuk mengisi data kelas ke sheet kelas
        $sensors = $this->model->limit(100)->orderBy('id', 'desc')->get()->getResultObject();

        $column = "A";
        $row    = 2;
        foreach ($sensors as  $sensor):
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->kecepatan_angin);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->tegangan_wind_turbine);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->tegangan_ats);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->arus_wind_turbine);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->arus_ats);
            $PHPExcel->setActiveSheetIndex(0)->setCellValue($column++ . $row,  $sensor->tanggal_dan_waktu);

            $row++;
            $column = 'A';
        endforeach;
        header('Content-Disposition: attachment;filename=download.xlsx');

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        die();
    }

    // untuk api
    public function store()
    {
       header("Content-Type: application/json");
        if (!$this->validate([
            'kecepatan_angin' => 'required|greater_than[0]',
            'tegangan_wind_turbine' => 'required|greater_than[0]',
            'tegangan_ats' => 'required|greater_than[0]',
            'arus_wind_turbine' => 'required|greater_than[0]',
            'arus_ats' => 'required|greater_than[0]'
        ])) {
            die(json_encode([
                'success' => false,
                'error' => 'Terjadi kesalahan penginputan suhu / denyut. Suhu minimal 27 dan Maximal 38, denyut minimal 0 dan maximal 150'
            ]));
        }

        $db = \Config\Database::connect();
        if (!$db->table($this->model->getTable())->insert([
            'kecepatan_angin' => $this->request->getGet('kecepatan_angin'),
            'arus_wind_turbine' => $this->request->getGet('arus_wind_turbine'),
            'arus_ats' => $this->request->getGet('arus_ats'),
            'tegangan_wind_turbine' => $this->request->getGet('tegangan_wind_turbine'),
            'tegangan_ats' => $this->request->getGet('tegangan_ats'),
            'daya_wind_turbine' => $this->request->getGet('daya_wind_turbine'),
        ])) {

            die(json_encode([
                'success' => false,
                'error' => 'Terjadi kesalahan saat menyimpan data ke database.'
            ]));
        }

        die(json_encode([
            'success' => true,
            'message' => 'Berhasil melakukan penginputan data ke database.'
        ]));
    }
}
