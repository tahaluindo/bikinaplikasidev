<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Tahun;
use App\Models\DataPenjualanAktual;

class HitungPrediksiPenjualanController extends Controller
{
    public function index()
    {

        

        if(request()->tahun_id) {
            
            $tahun = Tahun::findOrFail(request()->tahun_id)->tahun - 1;
            $data['tahun'] = Tahun::findOrFail(request()->tahun_id)->tahun;
            $data['produk'] = Produk::findOrFail(request()->produk_id)->nama;
            $tahun = Tahun::where('tahun', $tahun)->first();
            if(!$tahun) {
    
                return back()->with('error', 'Tahun prediksi sebelumnya tidak ada! Tambah tahun.');
            }

            $data_penjualan_aktual = DataPenjualanAktual::where('produk_id', request()->produk_id)->where('tahun_id', $tahun->id)->first();
            $data_penjualan_aktual_detail = $data_penjualan_aktual->data_penjualan_aktual_details->reverse()->values()->toArray();
            $data_penjualan_aktual_detail_prediksi = [];
            
            $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_aktual_detail[2]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Januari', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[0]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Februari', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail[0]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[0]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[1]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Maret', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[0]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[1]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[2]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'April', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[1]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[2]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[3]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Mei', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[2]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[3]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[4]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Juni', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[3]['harga_per_kg'] + $data_penjualan_aktual_detail[4]['harga_per_kg'] + $data_penjualan_aktual_detail[5]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Juli', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[4]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[5]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[6]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Agustus', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[5]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[6]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[7]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'September', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[6]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[7]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[8]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Oktober', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail_prediksi[7]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[8]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[9]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'November', 'harga_per_kg' => $rata_rata];

            $rata_rata = number_format((float) ($data_penjualan_aktual_detail[8]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[9]['harga_per_kg'] + $data_penjualan_aktual_detail_prediksi[10]['harga_per_kg']) / 3, 2, ".", "");
            $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Desember', 'harga_per_kg' => $rata_rata];

            // $rata_rata = round(($data_penjualan_aktual_detail[11]['harga_per_kg'] + $data_penjualan_aktual_detail[1]['harga_per_kg'] + $data_penjualan_aktual_detail[2]['harga_per_kg']) / 3, 2);
            // $data_penjualan_aktual_detail_prediksi[] = ['bulan' => 'Januari', 'harga_per_kg' => $rata_rata];

            $data['data_penjualan_aktual_detail_prediksis'] = $data_penjualan_aktual_detail_prediksi;
        }

        $data['produks'] = Produk::all();
        $data['tahuns'] = Tahun::all();
        
        return view("hitung-prediksi-penjualan.index", $data);
    }
}
