<?php

namespace App\Http\Controllers;

use App\Penjualan;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function index()
    {
        $data['pesanans'] = Penjualan::where('id_pelanggan', auth()->user()->id)->whereIn('status', ['Sudah Konfirmasi', 'Selesai'])->with('detail_penjualans')->get();

        return view('pesanan.index', $data);
    }
}
