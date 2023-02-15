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

        $data['produks'] = Produk::all();
        $data['tahuns'] = Tahun::all();
        

        return view('data-prediksi.index', $data);
    }
}
