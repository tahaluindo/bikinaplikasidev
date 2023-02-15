<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPenjualanPrediksi;
use App\Models\DataPenjualanPrediksiDetail;
use App\Models\Tahun;
use App\Models\Produk;

class DataPrediksiController extends Controller
{
    public function index()
    {
        $data['data_penjualan_detail_prediksis'] = DataPenjualanPrediksiDetail::all();
        
        if(request()->cari) {
            $data_penjualan_prediksi = DataPenjualanPrediksi::where('produk_id', request()->produk_id)->where('tahun_id', request()->tahun_id)->first();

            if(!$data_penjualan_prediksi = DataPenjualanPrediksi::where('produk_id', request()->produk_id)->where('tahun_id', request()->tahun_id)->first()) {

                return back()->with('error', 'Data prediksi tidak ditemukan');
            }

            $data['data_penjualan_detail_prediksis'] = DataPenjualanPrediksiDetail::where('data_penjualan_prediksi_id', $data_penjualan_prediksi->id)->get();
        }

        if(request()->produk_id && request()->tahun_id) {
            $data['produk'] = Produk::findOrFail(request()->produk_id)->nama;
            $data['tahun'] = Tahun::findOrFail(request()->tahun_id)->tahun;
        }
        
        if(request()->download) {
            $this->download($data['produk'], $data['tahun']);
        }

        $data['produks'] = Produk::all();
        $data['tahuns'] = Tahun::all();
        

        return view('data-prediksi.index', $data);
    }

    
    public function download($produk, $tahun)
    {

        $data_penjualan_prediksis = DataPenjualanPrediksi::where([
            'produk_id' => request()->produk_id,
            'tahun_id' => request()->tahun_id
        ])->first();

        $data_penjualan_prediksis_detail = DataPenjualanPrediksiDetail::where('data_penjualan_prediksi_id', $data_penjualan_prediksis->id)->get()->toArray();

        // dd($data_penjualan_prediksi);
        // todo: gunakan library PHPExcel
        $PHPExcel = new \PHPExcel();
        $file          = 'file_excel/download_hitung_prediksi.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($file);
        $PHPExcel      = \PHPExcel_IOFactory::createReader($inputFileType);
        $PHPExcel      = $PHPExcel->load($file);
        $PHPExcel->setActiveSheetIndex(0);

        // untuk mengatur tanggal
        $styleArray = array(
            'font' => array(
                'bold'       => true,
                'color'      => array('rgb' => '000000'),
                'size'       => 11,
                'name'       => 'Times New Roman',
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $produk = strtoupper($produk);
        $PHPExcel->getActiveSheet()->getCell('B4')->setValue("HASIL PREDIKSI PENJUALAN \"$produk\" TAHUN \"$tahun\"");
        $PHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($styleArray);

        $PHPExcel->getActiveSheet()->getCell('B6')->setValue($produk);
        $PHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($styleArray);

        // isi ke excel
        $column = "B";
        $row    = 8;
        $PHPExcel->setActiveSheetIndex(0);
        $no = 1;
        foreach ($data_penjualan_prediksis_detail as $index => $item):

            $PHPExcel->getActiveSheet()->setCellValue('B' . $row, $no);
            $PHPExcel->getActiveSheet()->setCellValue('C' . $row, $data_penjualan_prediksis->tahun->tahun);
            $PHPExcel->getActiveSheet()->setCellValue('D' . $row, $item['bulan']);
            $PHPExcel->getActiveSheet()->setCellValue('E' . $row, $item['volume']);
            $PHPExcel->getActiveSheet()->setCellValue('F' . $row, $item['harga_per_kg']);
            $PHPExcel->getActiveSheet()->setCellValue('G' . $row, $item['volume'] * $item['harga_per_kg']);

            $no++;
            $row++;
        endforeach;

        // todo: memerintahkan browser untuk melakukan download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=download_hitung_prediksi.xls");

        // todo: lakukan penulisan ke file excel
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, $inputFileType);
        $objWriter->save('php://output');

        die;
    }
}
