<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Tahun;
use App\Models\DataPenjualanPrediksi;

class GrafikController extends Controller
{
    public function index()
    {
        $data['produks'] = Produk::all();
        $data['tahuns'] = Tahun::all();
        
        if(request()->tahun_id) {
            $data['data_penjualan_prediksi'] = DataPenjualanPrediksi::where('produk_id', request()->produk_id)->where('tahun_id', request()->tahun_id)->first();
            $data['data_penjualan_prediksi_tahun'] = DataPenjualanPrediksi::where('produk_id', request()->produk_id)->get();

        }
        
        return view('grafik.index', $data);
    }
}
