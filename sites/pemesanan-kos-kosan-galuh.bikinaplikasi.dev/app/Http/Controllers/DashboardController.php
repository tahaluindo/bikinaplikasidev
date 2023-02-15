<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;
use App\Type;
use App\Kamar;
use App\Penyewa;
use App\PerpanjanganSewa;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $seminggu_selanjutnya = date('Y-m-d', strtotime('+7 day', strtotime(date('Y-m-d'))));

        $data['tagihan_terdekats'] = Tagihan::where('jatuh_tempo', '>=', date('Y-m-d'))->where('jatuh_tempo', '<=', $seminggu_selanjutnya)->orderBy('jatuh_tempo', 'asc')->limit(50)->get();
        $data['kamar_kosongs'] = Kamar::where('status', '=', 'kosong')->orderBy('id', 'desc')->limit(50)->get();
        $data['total_type']  = Type::all()->count('id');
        $data['total_kamar']  = Kamar::all()->count('id');
        $data['total_penyewa']  = Penyewa::all()->count('id');

        // data penyewa
        $data['penyewa_hari_ini'] = Penyewa::where('created_at', '>=', date('Y-m-d'))->get()->count('id');
        $data['penyewa_kemarin'] = Penyewa::where('created_at', '>=', date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['penyewa_minggu_lalu'] = Penyewa::where('created_at', '>=', date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['penyewa_bulan_lalu'] = Penyewa::where('created_at', '>=', date('Y-m-d', strtotime('-31 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['penyewa_semua'] = Penyewa::all()->count('id');

        // data PerpanjanganSewa
        $data['pembayaran_hari_ini'] = PerpanjanganSewa::where('created_at', '>=', date('Y-m-d'))->get()->count('id');
        $data['pembayaran_kemarin'] = PerpanjanganSewa::where('created_at', '>=', date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['pembayaran_minggu_lalu'] = PerpanjanganSewa::where('created_at', '>=', date('Y-m-d', strtotime('-7 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['pembayaran_bulan_lalu'] = PerpanjanganSewa::where('created_at', '>=', date('Y-m-d', strtotime('-31 day', strtotime(date('Y-m-d')))))->where('created_at', '<=', date('Y-m-d'))->get()->count('id');
        $data['pembayaran_semua'] = PerpanjanganSewa::all()->count('id');

        return view('dashboard', $data);
    }
}
