<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Tahun;
use App\Models\DataPenjualanAktual;
use App\Models\DataPenjualanPrediksi;
use App\Models\DataPenjualanPrediksiDetail;

class HitungPrediksiHargaController extends Controller
{
    public function index()
    {
        if(request()->produk_id && request()->tahun_id) {
            $data['produk'] = Produk::findOrFail(request()->produk_id)->nama;
            $data['tahun'] = Tahun::findOrFail(request()->tahun_id)->tahun;
        }
        
        if(request()->hitung) {

            $data['data_penjualan_detail_prediksis'] = $this->hitung();
        }

        if(request()->simpan) {
            \DB::transaction(function() {
                $data_penjualan_prediksi_create = DataPenjualanPrediksi::updateOrCreate([
                    'produk_id' => request()->produk_id,
                    'tahun_id' => request()->tahun_id
                ], [
                    'produk_id' => request()->produk_id,
                    'tahun_id' => request()->tahun_id
                ]);

                foreach ($this->hitung() as $key => $value) {
                    
                    DataPenjualanPrediksiDetail::updateOrCreate([
                        'data_penjualan_prediksi_id' => $data_penjualan_prediksi_create->id,
                        'bulan' => $value['bulan']
                    ], [
                        'harga_per_kg' => $value['harga_per_kg']
                    ]);
                }
            });

            return redirect()->back()->with('success', 'Berhasil menyimpan data prediksi');
        }

        if(request()->download) {
            $this->download($data['produk'], $data['tahun'], $this->hitung());
        }

        $data['produks'] = Produk::all();
        $data['tahuns'] = Tahun::all();
        
        return view("hitung-prediksi-harga.index", $data);
    }

    public function hitung()
    {
        $tahun = Tahun::findOrFail(request()->tahun_id)->tahun - 1;
        $data['tahun'] = Tahun::findOrFail(request()->tahun_id)->tahun;
        $data['produk'] = Produk::findOrFail(request()->produk_id)->nama;
        $tahun = Tahun::where('tahun', $tahun)->first();
        if(!$tahun) {

            return back()->with('error', 'Tahun prediksi sebelumnya tidak ada! Tambah tahun.');
        }

        $data_penjualan_aktual = DataPenjualanAktual::where('produk_id', request()->produk_id)->where('tahun_id', $tahun->id)->first();
        $data_penjualan_aktual_detail = $data_penjualan_aktual->data_penjualan_aktual_details->reverse()->values()->toArray();
        $data_penjualan_detail_prediksi = [];
        
        $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_aktual_detail[2]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Januari', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_detail_prediksi[0]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Februari', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_detail_prediksi[0]['harga_per_kg'] + $data_penjualan_detail_prediksi[1]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Maret', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[0]['harga_per_kg'] + $data_penjualan_detail_prediksi[1]['harga_per_kg'] + $data_penjualan_detail_prediksi[2]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'April', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[1]['harga_per_kg'] + $data_penjualan_detail_prediksi[2]['harga_per_kg'] + $data_penjualan_detail_prediksi[3]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Mei', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[2]['harga_per_kg'] + $data_penjualan_detail_prediksi[3]['harga_per_kg'] + $data_penjualan_detail_prediksi[4]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Juni', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[3]['harga_per_kg'] + $data_penjualan_detail_prediksi[4]['harga_per_kg'] + $data_penjualan_detail_prediksi[5]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Juli', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[4]['harga_per_kg'] + $data_penjualan_detail_prediksi[5]['harga_per_kg'] + $data_penjualan_detail_prediksi[6]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Agustus', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[5]['harga_per_kg'] + $data_penjualan_detail_prediksi[6]['harga_per_kg'] + $data_penjualan_detail_prediksi[7]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'September', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[6]['harga_per_kg'] + $data_penjualan_detail_prediksi[7]['harga_per_kg'] + $data_penjualan_detail_prediksi[8]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Oktober', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[7]['harga_per_kg'] + $data_penjualan_detail_prediksi[8]['harga_per_kg'] + $data_penjualan_detail_prediksi[9]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'November', 'harga_per_kg' => $rata_rata];

        $rata_rata = number_format((float) ($data_penjualan_detail_prediksi[8]['harga_per_kg'] + $data_penjualan_detail_prediksi[9]['harga_per_kg'] + $data_penjualan_detail_prediksi[10]['harga_per_kg']) / 3, 2, ".", "");
        $data_penjualan_detail_prediksi[] = ['tahun' => $data['tahun'], 'volume' => '', 'nilai' => '', 'produk' => $data['produk'], 'bulan' => 'Desember', 'harga_per_kg' => $rata_rata];

        // $rata_rata = round(($data_penjualan_aktual_detail[11]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_aktual_detail[2]['harga_per_kg']) / 3, 2);
        // $data_penjualan_detail_prediksi[] = ['bulan' => 'Januari', 'harga_per_kg' => $rata_rata];

        return $data_penjualan_detail_prediksi;
    }

    public function download($produk, $tahun, $data_penjualan_prediksis)
    {
        $data_penjualan_prediksis = DataPenjualanPrediksi::where([
            'produk_id' => request()->produk_id,
            'tahun_id' => request()->tahun_id
        ])->first();

        if(!$data_penjualan_prediksis) {

            return redirect()->back()->with('error', 'Data penjualan belum disimpan!');
        }

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
